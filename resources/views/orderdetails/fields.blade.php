<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', __('Status').':') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Equipment Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('equipment_id', __('Equipment Id').':') !!}
    {!! Form::text('equipment_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('num', __('Num').':') !!}
    {!! Form::text('num', null, ['class' => 'form-control']) !!}
</div>

<!-- Unit Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unit_price', __('Unit Price').':') !!}
    {!! Form::text('unit_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Order Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_id', __('Order Id').':') !!}
    {!! Form::text('order_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('User Id').':') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orderdetails.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>
