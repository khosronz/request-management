<div class="row">
    <!-- Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('id', __('Id').':') !!}
        <p>{!! $link->id !!}</p>
    </div>

    <!-- Title Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('title', __('Title').':') !!}
        <p>{!! $link->title !!}</p>
    </div>

    <!-- Url Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('url', __('Url').':') !!}
        <p>{!! $link->url !!}</p>
    </div>

    <!-- Expression Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('expression', __('Expression').':') !!}
        <p>{!! $link->expression !!}</p>
    </div>

    <!-- User Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('user_id', __('User Id').':') !!}
        <p>{!! $link->user->name !!}</p>
    </div>

    <!-- Desc Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('desc', __('Desc').':') !!}
        <p>{!! $link->desc !!}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('created_at', __('Created At').':') !!}
        <p>{!! jdate($link->created_at) !!}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('updated_at', __('Updated At').':') !!}
        <p>{!! jdate($link->updated_at) !!}</p>
    </div>


</div>