<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $organizationUser->id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('User Id').':') !!}
    <p>{!! $organizationUser->user->name !!}</p>
</div>

<!-- Organization Id Field -->
<div class="form-group">
    {!! Form::label('organization_id', __('Organization Id').':') !!}
    <p>{!! $organizationUser->organization->title !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! jdate($organizationUser->created_at) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! jdate($organizationUser->updated_at) !!}</p>
</div>

