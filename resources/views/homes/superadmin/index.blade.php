@extends('layouts.app')
{{--@extends('layouts.all-custom')--}}

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('Super Admin Dashboard')</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="row">
                         @include('homes.superadmin.status.cards')

                     </div>
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify ml-1"></i>
                             @lang('Super Admin Dashboard')
                         </div>
                         <div class="card-body">

                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

