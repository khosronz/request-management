<div class="row">
    <!-- Id Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('id', __('Id').':') !!}
        <p>{!! $organization->id !!}</p>
    </div>

    <!-- Title Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('title', __('Title').':') !!}
        <p>{!! $organization->title !!}</p>
    </div>

    <!-- Parent Id Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('parent_id', __('Parent Id').':') !!}
        <p>{!! $organization->parent['title'] !!}</p>
    </div>

    <!-- Desc Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('desc', __('Desc').':') !!}
        <p>{!! $organization->desc !!}</p>
    </div>


    <!-- Created At Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('created_at', __('Created At').':') !!}
        <p>{!! jdate($organization->created_at) !!}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('updated_at', __('Updated At').':') !!}
        <p>{!! jdate($organization->updated_at) !!}</p>
    </div>


</div>