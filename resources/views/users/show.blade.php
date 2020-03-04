@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! route('users.index') !!}">@lang('User')</a>
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
                                  <a href="{!! route('users.index') !!}" class="btn btn-ghost-light">@lang('Back')</a>
                             </div>
                             <div class="card-body">
                                 @include('users.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
     @php
         $roles=$user->roles;
     @endphp

     <div id="accordion">
         <div class="container-fluid">
             <div class="animated fadeIn">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                     <i class="fa fa-plus-square fa-lg mr-2"></i>
                                     <strong>@lang('User Roles')</strong>
                                 </a>
                             </div>
                             <div class="card-body collapse" id="collapseOne" data-parent="#accordion">
                                 @include('roles.table')
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
@endsection
