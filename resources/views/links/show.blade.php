@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! route('links.index') !!}">@lang('Link')</a>
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
                                  <a href="{!! route('links.index') !!}" class="btn btn-ghost-info">@lang('Back')</a>
                             </div>
                             <div class="card-body">
                                 @include('links.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
     <div class="container-fluid">
         <div class="animated fadeIn">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <strong>@lang('Crawler')</strong>
                         </div>
                         <div class="card-body">
                             @include('links.show_crowls')
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>


@endsection