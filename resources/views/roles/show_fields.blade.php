<div class="row">
    <!-- Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('id', __('Id').':') !!}
        <p>{!! $role->id !!}</p>
    </div>

    <!-- Title Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('title', __('Title').':') !!}
        <p>{!! $role->title !!}</p>
    </div>

    <!-- Desc Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('desc', __('Desc').':') !!}
        <p>{!! $role->desc !!}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('created_at', __('Created At').':') !!}
        <p>{!! jdate($role->created_at) !!}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('updated_at', __('Updated At').':') !!}
        <p>{!! jdate($role->updated_at) !!}</p>
    </div>


</div>