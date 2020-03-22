@extends('layouts.app')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('Logs')</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            @lang('Logs')
                        </div>
                        <div class="card-body">
                            {{--@dd($logs)--}}
                            @php
                                $user=\Illuminate\Support\Facades\Auth::user();
                                //dd($api_token);
                            @endphp

                            <main-logger-table-filtered-component :logs="{{$logs}}"></main-logger-table-filtered-component>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

