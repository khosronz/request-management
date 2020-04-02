<?php

namespace App\Http\Controllers;


use App\Enums\VerifiedType;
use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Laracasts\Flash\Flash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $orderRepository;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepository = $orderRepo;
        $this->middleware(['auth' => 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        switch ($user) {
            case $user->isSuperadmin():
                return $this->superadminindex();
                break;
            case $user->isMaster():
                return $this->masterindex();
                break;
            case $user->isOwner():
                return $this->ownerindex();
                break;
            case $user->isFinancial():
                return $this->financialindex();
                break;
            case $user->isProtection():
                return $this->protectionindex();
                break;
            case $user->isSuccessor():
                return $this->successorindex();
                break;
            case $user->isSupport():
                return $this->supportindex();
                break;
            case $user->isSupplier():
                return $this->supplierindex();
                break;
        }

        return view('home');
    }

    public function ownercreate()
    {
        $orders = Order::where('user_id', '=', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('homes.owner.create-orders')
            ->with('orders', $orders);
    }

    public function superadminindex()
    {

        if (Gate::allows('supperadmin-dashboard')) {

            $orders = Order::where('user_id', '=', Auth::id())
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            return view('homes.superadmin.index')
                ->with('orders', $orders);

        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));

    }

    public function masterindex()
    {
        $order_ids = Auth::user()->orderCategories()->pluck('id');
//        dd($order_ids);

        if (Gate::allows('master-dashboard')) {
            $orders = Order::whereIn('id',$order_ids)
                ->whereOr('verified', '=', VerifiedType::master_waite)
                ->whereOr('verified', '=', VerifiedType::financial_waite)
                ->whereOr('verified', '=', VerifiedType::protection_waite)
                ->whereOr('verified', '=', VerifiedType::completed_wait)
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            return view('homes.master.index')->with('orders', $orders);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));

    }

    public function successorindex()
    {
        $order_ids = Auth::user()->orderCategories()->pluck('id');
        if (Gate::allows('successor-dashboard')) {
            $orders = Order::whereIn('id',$order_ids)
                ->where('verified', '=', VerifiedType::successor_waite)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            return view('homes.successor.index')
                ->with('orders', $orders);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    public function supportindex()
    {
        $order_ids = Auth::user()->orderCategories()->pluck('id');
        if (Gate::allows('support-dashboard')) {
            $orders = Order::whereIn('id',$order_ids)
                ->where('verified', '=', VerifiedType::support_waite)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            return view('homes.support.index')
                ->with('orders', $orders);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));

    }

    public function supplierindex()
    {
        $order_ids = Auth::user()->orderCategories()->pluck('id');
        if (Gate::allows('supplier-dashboard')) {
            $orders = Order::whereIn('id',$order_ids)
                ->where('verified', '=', VerifiedType::supplier_waite)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            return view('homes.supplier.index')
                ->with('orders', $orders);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    public function ownerindex()
    {
        if (Gate::allows('owner-dashboard')) {
            $orders = Order::where('user_id', '=', Auth::id())
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $orders_not_paginate = Order::where('user_id', '=', Auth::id())
                ->orderBy('created_at', 'desc')
                ->get();

            return view('homes.owner.index')
                ->with('orders', $orders)
                ->with('orders_not_paginate', $orders_not_paginate);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));


    }

    public function protectionindex()
    {
        if (Gate::allows('protection-dashboard')) {
//            $orders = Order::whereOr('verified', '=', VerifiedType::protection_waite)
//                ->orderBy('created_at', 'desc')
//                ->paginate(10);

            $orders = $this->orderRepository->ordersByProtectionCategoryEquipment()->paginate(10);

            return view('homes.protection.index')
                ->with('orders', $orders);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    public function financialindex()
    {
        $order_ids = Auth::user()->orderCategories()->pluck('id');

        if (Gate::allows('financial-dashboard')) {
            $orders = Order::whereIn('id',$order_ids)
                ->where('verified', '=', VerifiedType::financial_waite)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            return view('homes.financial.index')
                ->with('orders', $orders);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));

    }

    public function profile()
    {
        return view('homes.profile.index');
    }


}
