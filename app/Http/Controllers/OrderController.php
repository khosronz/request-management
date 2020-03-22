<?php

namespace App\Http\Controllers;

use App\Enums\VerifiedType;
use App\Enums\VerifiedWaiteStatus;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Card;
use App\Models\Order;
use App\Repositories\CardRepository;
use App\Repositories\OrderdetailRepository;
use App\Repositories\OrderRepository;
use Carbon\Carbon;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Response;

class OrderController extends AppBaseController
{
    /** @var  OrderRepository */
    private $orderRepository;
    private $orderdetailRepository;
    private $cardRepository;

    public function __construct(OrderRepository $orderRepo, OrderdetailRepository $orderdetailRepo, CardRepository $cardRepo)
    {
        $this->orderRepository = $orderRepo;
        $this->orderdetailRepository = $orderdetailRepo;
        $this->cardRepository = $cardRepo;
    }

    /**
     * Display a listing of the Order.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $orders = $this->orderRepository->paginate(10);
        $orders_not_paginate = $this->orderRepository->all();

        return view('orders.index')
            ->with('orders', $orders)
            ->with('orders_not_paginate', $orders_not_paginate);
    }

    /**
     * Show the form for creating a new Order.
     *
     * @return Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created Order in storage.
     *
     * @param CreateOrderRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderRequest $request)
    {
        $input = $request->all();

        $order = $this->orderRepository->create($input);

        Flash::success(__('Order') . ' ' . __('saved successfully.'));

        return redirect(route('orders.index'));
    }

    /**
     * Store a newly created Order in storage.
     *
     * @param CreateOrderRequest $request
     *
     * @return Response
     */
    public function convertCardOrder()
    {
        $cards = Card::where('user_id', '=', Auth::id())->get();

        if (empty($cards)) {
            Flash::error(__('Cards') . ' ' . __('Not is empty.|'));
            return back();
        } else {
            DB::beginTransaction();
            $order = [
                'title' => Str::uuid()->toString(),
                'verified' => VerifiedType::owner_waite,
                'desc' => '',
                'user_id' => Auth::id(),
                'created_at' => Date::now()->toString(),
                'updated_at' => Date::now()->toString(),
            ];

            $order = $this->orderRepository->create($order);


            foreach ($cards as $card) {

                $orderDetail = [
                    'status' => '1',
                    'equipment_id' => $card->equipment_id,
                    'num' => $card->num,
                    'unit_price' => null,
                    'order_id' => $order->id,
                    'user_id' => Auth::id(),
                    'created_at' => Date::now()->toString(),
                    'updated_at' => Date::now()->toString(),
                ];

                $orderDetail = $this->orderdetailRepository->create($orderDetail);

            }

            foreach ($cards as $card) {
                $this->cardRepository->delete($card->id);
            }


            Flash::success(__('Order') . ' ' . __('saved successfully.'));
            DB::commit();
        }


        return redirect(route('orders.index'));
    }

    /**
     * Display the specified Order.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error(__('Order') . ' ' . __('not found.'));

            return redirect(route('orders.index'));
        }

        return view('orders.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified Order.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error(__('Order') . ' ' . __('not found.'));

            return redirect(route('orders.index'));
        }

        return view('orders.edit')->with('order', $order);
    }

    /**
     * Update the specified Order in storage.
     *
     * @param int $id
     * @param UpdateOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderRequest $request)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error(__('Order') . ' ' . __('not found.'));

            return redirect(route('orders.index'));
        }

        $order = $this->orderRepository->update($request->all(), $id);

        Flash::success(__('Order') . ' ' . __('updated successfully.'));

        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified Order from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error(__('Order') . ' ' . __('not found.'));

            return redirect(route('orders.index'));
        }

        $this->orderRepository->delete($id);

        Flash::success(__('Order') . ' ' . __('deleted successfully.'));

        return redirect(route('orders.index'));
    }

    public function block($id, Request $request)
    {
        $input = $request->all();

        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error(__('Order') . ' ' . __('not found.'));

            return redirect(route('orders.index'));
        }

        $order = $this->change_status_block($order, Auth::user());
        $input=$order->toArray();
//        dd($order->toArray(),$input);
        $order = $this->orderRepository->update($input, $id);

        Flash::success(__('Order') . ' ' . __('updated successfully.'));

        return back();
    }

    public function success($id, Request $request)
    {
        $input = $request->all();

        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error(__('Order') . ' ' . __('not found.'));

            return redirect(route('orders.index'));
        }

        $order = $this->change_status_wait($order, Auth::user());
        $input=$order->toArray();
//        dd($order->toArray(),$input);
        $order = $this->orderRepository->update($input, $id);

        Flash::success(__('Order') . ' ' . __('updated successfully.'));

        return back();
    }

    public function change_status_wait($order, $user)
    {
        if ($user->isMaster()){
            // protection or supplier

            // if we have protection category in the order details send to the protection
            // if we have not protection category in the order details send to the supplier

            // for waite you must change two fields
                // 1 -> verified        (protection_wait,supplier_wait)
                // 2 -> waite_status    (wait)
            $order->verified=VerifiedType::supplier_waite;
            $order->waite_status=VerifiedWaiteStatus::waite;
        }
        if ($user->isOwner()){
            // Successor
            $order->verified=VerifiedType::successor_waite;
            $order->waite_status=VerifiedWaiteStatus::waite;
        }
        if ($user->isFinancial()){
            // Completed
            // Support and master and owner
            $order->verified=VerifiedType::completed;
            $order->waite_status=VerifiedWaiteStatus::waite;
        }
        if ($user->isProtection()){
            // supplier
            $order->verified=VerifiedType::supplier_waite;
            $order->waite_status=VerifiedWaiteStatus::waite;
        }
        if ($user->isSuccessor()){
            // Master
            $order->verified=VerifiedType::master_waite;
            $order->waite_status=VerifiedWaiteStatus::waite;
        }

        return $order;
    }

    public function change_status_block($order, $user)
    {
        if ($user->isMaster()){
            // owner and successor

            // for waite you must change two fields
            // 1 -> verified        (master_wait)
            // 2 -> waite_status    (block)

            $order->verified=VerifiedType::master_waite;
            $order->waite_status=VerifiedWaiteStatus::blocked;
        }
        if ($user->isOwner()){
            // Successor
            $order->verified=VerifiedType::owner_waite;
            $order->waite_status=VerifiedWaiteStatus::blocked;
        }
        if ($user->isFinancial()){
            // Completed
            // Support and master and owner
            $order->verified=VerifiedType::financial_waite;
            $order->waite_status=VerifiedWaiteStatus::blocked;
        }
        if ($user->isProtection()){
            // supplier
            $order->verified=VerifiedType::protection_waite;
            $order->waite_status=VerifiedWaiteStatus::blocked;
        }
        if ($user->isSuccessor()){
            // Master
            $order->verified=VerifiedType::successor_waite;
            $order->waite_status=VerifiedWaiteStatus::blocked;
        }

        return $order;
    }
}
