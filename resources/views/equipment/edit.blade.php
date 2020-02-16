@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('equipment.index') !!}">@lang('Equipment')</a>
          </li>
          <li class="breadcrumb-item active">@lang('Edit')</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>@lang('Edit Equipment')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($equipment, ['route' => ['equipment.update', $equipment->id], 'method' => 'patch']) !!}

                              @include('equipment.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection