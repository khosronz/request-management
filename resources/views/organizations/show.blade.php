@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('organizations.index') !!}">@lang('Organization')</a>
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
                            <a href="{!! route('organizations.index') !!}" class="btn btn-ghost-light">@lang('Back')</a>
                        </div>
                        <div class="card-body">
                            @include('organizations.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('organization_users.index-create')

    @php
        $organizationUsers=\App\Models\OrganizationUser::where('organization_id','=',$organization->id)->paginate(10);
    @endphp

    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            @lang('Organization Users')
                        </div>
                        <div class="card-body">
                            @include('organization_users.table')
                            <div class="pull-left mr-3" dir="ltr">

                                @include('coreui-templates::common.paginate', ['records' => $organizationUsers])

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
