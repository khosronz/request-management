@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! route('roles.index') !!}">@lang('Role')</a>
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
                                  <a href="{!! route('roles.index') !!}" class="btn btn-ghost-info">@lang('Back')</a>
                             </div>
                             <div class="card-body">
                                 @include('roles.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
     @include('role_users.index-create')

     @php
         $roleUsers=\App\Models\RoleUser::where('role_id','=',$role->id)->get();
     @endphp

     <div class="container-fluid">
         <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             @lang('Role Users')
                         </div>
                         <div class="card-body">
                             @include('role_users.table')
                             {{--<div class="pull-left mr-3" dir="ltr">--}}

                                 {{--@include('coreui-templates::common.paginate', ['records' => $roleUsers])--}}

                             {{--</div>--}}
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
@endsection
