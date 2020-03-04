<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $roleUser->id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('User Id').':') !!}
    <p>{!! $roleUser->user->name !!}</p>
</div>

<!-- Role Id Field -->
<div class="form-group">
    {!! Form::label('role_id', __('Role Id').':') !!}
    <p>{!! $roleUser->role->title !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! jdate($roleUser->created_at) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! jdate($roleUser->updated_at) !!}</p>
</div>

