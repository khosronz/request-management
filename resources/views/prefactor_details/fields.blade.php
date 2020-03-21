<!-- Status Field -->
<div class="form-group col-sm-6 sr-only">
    {!! Form::label('status', __('Status').':') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Equipment Id Field -->
<div class="form-group col-sm-6 sr-only">
    {!! Form::label('equipment_id', __('Equipment Id').':') !!}
    {!! Form::text('equipment_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Num Field -->
<div class="form-group col-sm-6 sr-only">
    {!! Form::label('num', __('Num').':') !!}
    {!! Form::text('num', null, ['class' => 'form-control']) !!}
</div>

<!-- Unit Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unit_price', __('Unit Price').':') !!}
    {!! Form::text('unit_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Prefactor Id Field -->
<div class="form-group col-sm-6 sr-only">
    {!! Form::label('prefactor_id', __('Prefactor Id').':') !!}
    {!! Form::text('prefactor_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6 sr-only">
    {!! Form::label('user_id', __('User Id').':') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('prefactorDetails.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>
