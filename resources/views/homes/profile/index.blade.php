@extends('layouts.app')
@extends('layouts.all-custom')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('Profile')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="row">
                         <div>
                             <div class="animated fadeIn">
                             @include('homes.profile.profile')
                             </div>
                         </div>

                     </div>
                 </div>
             </div>
         </div>
    </div>
    @include('homes.profile.logs.index')
@endsection

