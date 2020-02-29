@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! route('messages.index') !!}">@lang('Message')</a>
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
                                  <a href="{!! route('tickets.index') !!}" class="btn btn-success"><i class="fa fa-arrow-left"></i> @lang('Back to my tickets')</a>
                                 <a href="{!! route('tickets.show', [$message->ticket_id]) !!}" class='btn btn-ghost-success'><i class="fa fa-undo"></i> @lang('Back to another messages of this ticket')</a>
                             </div>
                             <div class="card-body">
                                 @include('messages.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
