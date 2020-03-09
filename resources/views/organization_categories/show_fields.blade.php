<div class="row">
    <!-- Id Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('id', __('Id').':') !!}
        <p>{!! $organizationCategory->id !!}</p>
    </div>

    <!-- User Id Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('user_id', __('User Id').':') !!}
        <p>{!! $organizationCategory->user->name !!}</p>
    </div>

    <!-- Category Id Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('category_id', __('Category Id').':') !!}
        <p>{!! $organizationCategory->category->title !!}</p>
    </div>

    <!-- Organization Id Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('organization_id', __('Organization Id').':') !!}
        <p>{!! $organizationCategory->organization->title !!}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('created_at', __('Created At').':') !!}
        <p>{!! jdate($organizationCategory->created_at) !!}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('updated_at', __('Updated At').':') !!}
        <p>{!! jdate($organizationCategory->updated_at) !!}</p>
    </div>


</div>