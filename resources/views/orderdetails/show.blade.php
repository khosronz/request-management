@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! url()->previous() !!}">@lang('Order')</a>
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
                                  <a href="{!! url()->previous() !!}" class="btn btn-ghost-light">@lang('Back')</a>
                             </div>
                             <div class="card-body">
                                 @include('orderdetails.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
