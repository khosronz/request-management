<div class="row">
    <!-- Id Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('id', __('Id').':') !!}
        <p>{!! $factory->id !!}</p>
    </div>


    <!-- Title Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('title', __('Title').':') !!}
        <p>{!! $factory->title !!}</p>
    </div>
    <!-- Created At Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('created_at', __('Created At').':') !!}
        <p>{!! jdate($factory->created_at) !!}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('updated_at', __('Updated At').':') !!}
        <p>{!! jdate($factory->updated_at) !!}</p>
    </div>

    <!-- Desc Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('desc', __('Desc').':') !!}
        <p>{!! $factory->desc !!}</p>
    </div>


</div>