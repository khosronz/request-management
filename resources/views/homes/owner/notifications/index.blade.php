@extends('layouts.app')
@extends('layouts.all-custom')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('Owner Dashboard')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="row">
                         <div class="col-lg-12">

                             <div class="card">
                                 <div class="card-header">
                                     <i class="fa fa-align-justify"></i>
                                     @lang('Notifications')
                                 </div>
                                 <div class="card-body">
                                     @include('homes.owner.notifications.table')
                                     {{--<div class="pull-left mr-3" dir="ltr">--}}

                                         {{--@include('coreui-templates::common.paginate', ['records' => $notifications])--}}

                                     {{--</div>--}}
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>
         </div>
    </div>
@endsection

