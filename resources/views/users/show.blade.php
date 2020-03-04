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

     @include('users.index-create-user-role')
     @php
         $roleUsers=\App\Models\RoleUser::where('user_id','=',$user->id)->get();
     @endphp

     <div id="accordion">
         <div class="container-fluid">
             <div class="animated fadeIn">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <a class="card-link" data-toggle="collapse" href="#collapseTable">
                                     <i class="fa fa-plus-square fa-lg mr-2"></i>
                                     <strong>@lang('User Roles')</strong>
                                 </a>
                             </div>
                             <div class="card-body collapse" id="collapseTable" data-parent="#accordion">
                                 @include('role_users.table')
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
@endsection
