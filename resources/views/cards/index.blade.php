@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('Cards')</li>
    </ol>
    @include('cards.index-create')

    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
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
@endsection

