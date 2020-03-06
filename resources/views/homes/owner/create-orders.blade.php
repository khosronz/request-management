@extends('layouts.app')
@extends('layouts.all-custom')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('Create Order')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="row">
                         <div class="col-sm-12">
                             <div class="card">
                                 <div class="card-header">
                                     <i class="fa fa-edit fa-lg"></i>
                                     <strong>@lang('Create Order')</strong>
                                 </div>
                                 <div class="card-body">
                                    <create-order-table-filtered-component :user_id="{{\Illuminate\Support\Facades\Auth::id()}}"></create-order-table-filtered-component>
                                 </div>
                             </div>


                         </div>

                     </div>
                     @php
                         $cards=\App\Models\Card::where('user_id','=',\Illuminate\Support\Facades\Auth::id())->paginate(10);
                     @endphp
                     <div class="row">
                         <div class="col-sm-12">
                             <div class="card">
                                 <div class="card-header">
                                     <i class="fa fa-align-justify"></i>
                                     @lang('cards')
                                 </div>
                                 <div class="card-body">
                                     <div class="container mb-2">
                                         <div class="row">
                                             <a class="btn btn-success" href="{!! route('cards.index') !!}">
                                                 <i class="fa fa-refresh"></i>
                                                 <span>@lang('Refresh Table Cart')</span>
                                             </a>
                                         </div>
                                     </div>
                                     @include('cards.table')
                                     <div class="pull-left mr-3" dir="ltr">
                                         @include('coreui-templates::common.paginate', ['records' => $cards])

                                     </div>
                                 </div>
                             </div>


                         </div>

                     </div>
                 </div>
             </div>
         </div>
    </div>
@endsection

