@extends('layouts.app')

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
                         @include('homes.owner.status.cards')

                     </div>
                     <div class="row">
                         <div id="accordion" class="col-sm-6">
                             <div class="animated fadeIn">

                                 @include('homes.owner.status.profile')
                             </div>
                         </div>
                         <div id="accordion" class="col-sm-6">
                             <div class="animated fadeIn">
                                 @include('homes.owner.status.notation')
                             </div>
                         </div>

                     </div>
                 </div>
             </div>
         </div>
    </div>
@endsection

