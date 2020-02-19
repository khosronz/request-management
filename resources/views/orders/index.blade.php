@extends('layouts.app')
@extends('layouts.all-custom')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('Orders')</li>
    </ol>
    @include('orders.index-create')

    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             @lang('orders')
                         </div>
                         <div class="card-body">
                             @include('orders.table')
                              <div class="pull-left mr-3" dir="ltr">

        @include('coreui-templates::common.paginate', ['records' => $orders])

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
    @include('orders.wizard')
@endsection

