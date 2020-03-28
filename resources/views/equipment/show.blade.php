@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('equipment.index') !!}">@lang('Equipment')</a>
        </li>
        <li class="breadcrumb-item active">@lang('Equipment Detail')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('coreui-templates::common.errors')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>@lang('Equipment Detail')</strong>
                            <a href="{!! route('equipment.index') !!}" class="btn btn-ghost-info">@lang('Back')</a>
                        </div>
                        <div class="card-body">
                            @include('equipment.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('comments.index-create')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>@lang('Comments')</strong>
                        </div>
                        @php
                            $comments=$equipment->comments;
                        @endphp
                        <div class="card-body">
                            @include('comments.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
