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
        $orders_not_paginate = Order::where('user_id', '=', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('homes.owner.create-orders')
            ->with('orders', $orders)
            ->with('orders_not_paginate', $orders_not_paginate);
    }

    public function superadminindex()
    {

        if (Gate::allows('supperadmin-dashboard')) {

            $orders = Order::where('user_id', '=', Auth::id())
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $orders_not_paginate = Order::where('user_id', '=', Auth::id())
                ->orderBy('created_at', 'desc')
                ->get();
            return view('homes.superadmin.index')->with('orders', $orders)
                ->with('orders_not_paginate', $orders_not_paginate);

        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));

    }

    public function masterindex()
    {
        if (Gate::allows('master-dashboard')) {
            $orders = Order::where('verified', '=', VerifiedType::master_waite)
                ->orWhere('verified', '=', VerifiedType::master_waite)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $orders_not_paginate = Order::where('verified', '=', VerifiedType::master_waite)
                ->orWhere('verified', '=', VerifiedType::master_waite)
                ->orderBy('created_at', 'desc')
                ->get();
            return view('homes.master.index')->with('orders', $orders)
                ->with('orders_not_paginate', $orders_not_paginate);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));

    }

    public function successorindex()
    {
        if (Gate::allows('successor-dashboard')) {
            $orders = Order::where('verified', '=', VerifiedType::successor_waite)
                ->orWhere('verified', '=', VerifiedType::successor_waite)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $orders_not_paginate = Order::where('verified', '=', VerifiedType::successor_waite)
                ->orWhere('verified', '=', VerifiedType::successor_waite)
                ->orderBy('created_at', 'desc')
                ->get();
            return view('homes.successor.index')->with('orders', $orders)
                ->with('orders_not_paginate', $orders_not_paginate);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    public function supportindex()
    {
        if (Gate::allows('support-dashboard')) {
            $orders = Order::where('verified', '=', VerifiedType::support_waite)
                ->orWhere('verified', '=', VerifiedType::support_waite)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $orders_not_paginate = Order::where('verified', '=', VerifiedType::support_waite)
                ->orWhere('verified', '=', VerifiedType::support_waite)
                ->orderBy('created_at', 'desc')
                ->get();
            return view('homes.support.index')->with('orders', $orders)
                ->with('orders_not_paginate', $orders_not_paginate);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));

    }

    public function supplierindex()
    {
        if (Gate::allows('supplier-dashboard')) {
            $orders = Order::where('verified', '=', VerifiedType::supplier_waite)
                ->orWhere('verified', '=', VerifiedType::supplier_waite)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $orders_not_paginate = Order::where('verified', '=', VerifiedType::supplier_waite)
                ->orWhere('verified', '=', VerifiedType::supplier_waite)
                ->orderBy('created_at', 'desc')
                ->get();
            return view('homes.supplier.index')->with('orders', $orders)
                ->with('orders_not_paginate', $orders_not_paginate);
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
//        $orders = Order::where('user_id','=',Auth::id())->paginate(10);
            return view('homes.owner.index')->with('orders', $orders)
                ->with('orders_not_paginate', $orders_not_paginate);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));


    }

    public function protectionindex()
    {
        if (Gate::allows('protection-dashboard')) {
            $orders = Order::where('verified', '=', VerifiedType::protection_waite)
                ->orWhere('verified', '=', VerifiedType::protection_waite)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $orders_not_paginate=Order::where('verified', '=', VerifiedType::protection_waite)
                ->orWhere('verified', '=', VerifiedType::protection_waite)
                ->orderBy('created_at', 'desc')
                ->get();
            return view('homes.protection.index')->with('orders', $orders)
                ->with('orders_not_paginate', $orders_not_paginate);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    public function financialindex()
    {
        if (Gate::allows('financial-dashboard')) {
            $orders = Order::where('verified', '=', VerifiedType::financial_waite)
                ->orWhere('verified', '=', VerifiedType::financial_waite)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $orders_not_paginate = Order::where('verified', '=', VerifiedType::financial_waite)
                ->orWhere('verified', '=', VerifiedType::financial_waite)
                ->orderBy('created_at', 'desc')
                ->get();
            return view('homes.financial.index')->with('orders', $orders)
                ->with('orders_not_paginate', $orders_not_paginate);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));

    }

    public function profile()
    {
        return view('homes.profile.index');
    }


}
