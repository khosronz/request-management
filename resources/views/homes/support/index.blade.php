@extends('layouts.app')
@extends('layouts.all-custom')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('Support Dashboard')</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="row">
                         @include('homes.support.status.cards')

                     </div>
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify ml-1"></i>
                             @lang('Support Dashboard')
                         </div>
                         <div class="card-body">
                            @include('homes.support.orders.table')
                             <div class="pull-left mr-3" dir="ltr">

                                 @include('coreui-templates::common.paginate', ['records' => $orders])

                             </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

