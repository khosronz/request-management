@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('media.index') !!}">@lang('Media')</a>
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
                              <strong>@lang('Edit Media')</strong>
                          </div>
                          <div class="card-body">
                             {!! Form::model($media, ['route' => ['media.update', $media->id],'enctype'=>"multipart/form-data", 'method' => 'patch']) !!}
                              @include('media.fields')



                                <!-- Submit Field -->
                                <div class="form-group col-sm-12">
                                    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
                                    <a href="{!! route('media.index') !!}" class="btn btn-default">@lang('Cancel')</a>
                                </div>

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection
