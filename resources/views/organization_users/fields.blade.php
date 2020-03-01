<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('User Id').':') !!}
    {!! Form::select('user_id', \App\User::pluck('name','id') ,null, ['class' => 'form-control']) !!}
</div>

<!-- Organization Id Field -->
<div class="form-group col-sm-6 sr-only">
    {!! Form::label('organization_id', __('Organization Id').':') !!}
    {!! Form::text('organization_id', $organization->id, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('organizationUsers.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>
