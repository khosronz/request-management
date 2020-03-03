@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('factories.index') !!}">@lang('Factory')</a>
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
                            <a href="{!! route('factories.index') !!}" class="btn btn-ghost-light">@lang('Back')</a>
                        </div>
                        <div class="card-body">
                            @include('factories.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            @include('factorytells.index-create')
        </div>
        <div class="col-sm-6">
            @include('factoryaddresses.index-create')
        </div>
    </div>
    @php
        $factorytells = $factory->factorytells;
        $factoryaddresses = $factory->factoryaddresses;
    @endphp
    <div class="row">
        <div class="col-sm-6">
            @include('factories.factortell-table')
        </div>
        <div class="col-sm-6">
            @include('factories.factoryaddress-table')
        </div>
    </div>

@endsection
