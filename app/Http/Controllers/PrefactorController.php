<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePrefactorRequest;
use App\Http\Requests\UpdatePrefactorRequest;
use App\Models\Prefactor;
use App\Repositories\OrderRepository;
use App\Repositories\PrefactorDetailRepository;
use App\Repositories\PrefactorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Response;

class PrefactorController extends AppBaseController
{
    /** @var  PrefactorRepository */
    private $prefactorRepository;
    private $prefactorDetailRepository;
    private $orderRepository;

    public function __construct(PrefactorRepository $prefactorRepo,
                                PrefactorDetailRepository $prefactorDetailRepo,
                                OrderRepository $orderRepo)
    {
        $this->prefactorRepository = $prefactorRepo;
        $this->prefactorDetailRepository = $prefactorDetailRepo;
        $this->orderRepository = $orderRepo;
    }

    /**
     * Display a listing of the Prefactor.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
//        $prefactors = $this->prefactorRepository->paginate(10);
        if (Auth::user()->isMaster() || Auth::user()->isSuperadmin()){
            $prefactors = Prefactor::paginate(10);
        }else{
            $prefactors = Prefactor::where('user_id',Auth::id())->paginate(10);
        }

        return view('prefactors.index')
            ->with('prefactors', $prefactors);
    }

    /**
     * Show the form for creating a new Prefactor.
     *
     * @return Response
     */
    public function create()
    {
        return view('prefactors.create');
    }


    public function createByOrder($id)
    {
        $order=$this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error(__('Order').' '.__('not found.'));

            return back();
        }

        return view('prefactors.create')
            ->with('order',$order);
    }

    /**
     * Store a newly created Prefactor in storage.
     *
     * @param CreatePrefactorRequest $request
     *
     * @return Response
     */
    public function store(CreatePrefactorRequest $request)
    {
        $input = $request->all();

        DB::beginTransaction();
        $prefactor = $this->prefactorRepository->create($input);

        $order=$this->orderRepository->find($input['order_id']);
        $orderDetails=$order->orderdetails()->get();
//        dd($orderDetails);

        foreach ($orderDetails as $orderDetail) {
//            $input=$orderDetail->toArray();
            $input['status']=$orderDetail->status;
            $input['equipment_id']=$orderDetail->equipment_id;
            $input['num']=$orderDetail->num;
            $input['unit_price']=$orderDetail->unit_price;
            $input['prefactor_id']=$prefactor->id;
            $input['user_id']=$orderDetail->user_id;

            $this->prefactorDetailRepository->create($input);
        }

        DB::commit();

        Flash::success(__('Prefactor').' '.__('saved successfully.'));

        return redirect(route('prefactors.index'));
    }

    /**
     * Display the specified Prefactor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $prefactor = $this->prefactorRepository->find($id);

        if (empty($prefactor)) {
            Flash::error(__('Prefactor').' '.__('not found.'));

            return redirect(route('prefactors.index'));
        }

        return view('prefactors.show')->with('prefactor', $prefactor);
    }

    /**
     * Show the form for editing the specified Prefactor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $prefactor = $this->prefactorRepository->find($id);

        if (empty($prefactor)) {
            Flash::error(__('Prefactor').' '.__('not found.'));

            return redirect(route('prefactors.index'));
        }

        return view('prefactors.edit')->with('prefactor', $prefactor);
    }

    /**
     * Update the specified Prefactor in storage.
     *
     * @param int $id
     * @param UpdatePrefactorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePrefactorRequest $request)
    {
        $prefactor = $this->prefactorRepository->find($id);

        if (empty($prefactor)) {
            Flash::error(__('Prefactor').' '.__('not found.'));

            return redirect(route('prefactors.index'));
        }

        $prefactor = $this->prefactorRepository->update($request->all(), $id);

        Flash::success(__('Prefactor').' '.__('updated successfully.'));

        return redirect(route('prefactors.index'));
    }

    /**
     * Remove the specified Prefactor from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $prefactor = $this->prefactorRepository->find($id);

        if (empty($prefactor)) {
            Flash::error(__('Prefactor').' '.__('not found.'));

            return redirect(route('prefactors.index'));
        }

        $this->prefactorRepository->delete($id);

        Flash::success(__('Prefactor').' '.__('deleted successfully.'));

        return redirect(route('prefactors.index'));
    }
}
