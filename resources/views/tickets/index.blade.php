@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('Tickets')</li>
    </ol>
    @include('tickets.index-create')

    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify ml-1"></i>
                             @lang('Tickets')
                         </div>
                         <div class="card-body">
                             {{--<main-ticket-table-filtered-component :user_id="{{\Illuminate\Support\Facades\Auth::id()}}"></main-ticket-table-filtered-component>--}}
                             @include('tickets.table')
                              <div class="pull-left mr-3" dir="ltr">

        @include('coreui-templates::common.paginate', ['records' => $tickets])

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>

    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify ml-1"></i>
                            @lang('Tickets must answer')
                        </div>
                        <div class="card-body">
                            @include('tickets.table-organization-tickets')
                            <div class="pull-left mr-3" dir="ltr">

                                @include('coreui-templates::common.paginate', ['records' => $orgtickets])

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

