@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! route('prefactorDetails.index') !!}">@lang('Notifications')</a>
            </li>
            <li class="breadcrumb-item active">@lang('Notification Detail')</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>@lang('Details')</strong>
                                  <a href="{!! url()->previous() !!}" class="btn btn-ghost-info">@lang('Back')</a>
{{--                                  <a href="{!! route('orders.index') !!}" class="btn btn-ghost-light">@lang('Back')</a>--}}
                             </div>
                             <div class="card-body">
                                 @include('homes.owner.notifications.show_fields')
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
@endsection
