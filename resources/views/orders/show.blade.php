@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! route('orders.index') !!}">@lang('Order')</a>
            </li>
            <li class="breadcrumb-item active">@lang('Detail')</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>@lang('Details')</strong>
                                  <a href="{!! route('orders.index') !!}" class="btn btn-ghost-light">@lang('Back')</a>
{{--                                  <a href="{!! route('orders.index') !!}" class="btn btn-ghost-light">@lang('Back')</a>--}}
                             </div>
                             <div class="card-body">
                                 @include('orders.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>

     @include('orderdetails.index-create')

     @php
         $orderdetails=\App\Models\Orderdetail::where('order_id','=',$order->id)->paginate(10);
     @endphp

     <div class="container-fluid">
         <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             @lang('Order Details')
                         </div>
                         <div class="card-body">
                             @include('orderdetails.table')
                             <div class="pull-left mr-3" dir="ltr">

                                 @include('coreui-templates::common.paginate', ['records' => $orderdetails])

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
@endsection
