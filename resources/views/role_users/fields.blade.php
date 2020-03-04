<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('User Id').':') !!}
    {!! Form::select('user_id', \App\User::pluck('name','id'),null, ['class' => 'form-control']) !!}
</div>

<!-- Role Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role_id', __('Role Id').':') !!}
    {!! Form::select('role_id', \App\Models\Role::pluck('title','id'),null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('roleUsers.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>
