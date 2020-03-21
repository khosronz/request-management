@extends('layouts.app')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('User') @lang('Logs')</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            @lang('User') @lang('Logs')
                        </div>
                        <div class="card-body">
                            {{--@dd($logs)--}}

                            <main-logger-user-table-filtered-component :logs="{{$logs}}" :user_id="{{\Illuminate\Support\Facades\Auth::id()}}"></main-logger-user-table-filtered-component>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

