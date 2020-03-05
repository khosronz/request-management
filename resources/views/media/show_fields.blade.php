<div class="row">
    <!-- Id Field -->
    <div class="form-group col-sm-3">
        <img src="{{asset($media->url)}}" alt="{{$media->alt}}" width="400px" height="300px" >
    </div>

    <!-- Id Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('id', __('Id').':') !!}
        <p>{!! $media->id !!}</p>
    </div>

    <!-- User Id Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('user_id', __('User Id').':') !!}
        <p>{!! $media->user->name !!}</p>
    </div>

    <!-- Title Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('title', __('Title').':') !!}
        <p>{!! $media->title !!}</p>
    </div>

    <!-- Alt Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('alt', __('Alt').':') !!}
        <p>{!! $media->alt !!}</p>
    </div>

    <!-- Url Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('url', __('Url').':') !!}
        <p>{!! $media->url !!}</p>
    </div>

    <!-- Desc Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('desc', __('Desc').':') !!}
        <p>{!! $media->desc !!}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('created_at', __('Created At').':') !!}
        <p>{!! jdate($media->created_at) !!}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('updated_at', __('Updated At').':') !!}
        <p>{!! jdate($media->updated_at) !!}</p>
    </div>


</div>