@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('Tickets')</li>
    </ol>

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

