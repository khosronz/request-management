<!-- User Id Field -->
<div class="form-group col-sm-6 sr-only">
    {!! Form::label('user_id', __('User Id').':') !!}
    {!! Form::text('user_id', $order->user_id, ['class' => 'form-control']) !!}
</div>

<!-- Order Id Field -->
<div class="form-group col-sm-6 sr-only">
    {!! Form::label('order_id', __('Order Id').':') !!}
    {!! Form::text('order_id', $order->id, ['class' => 'form-control']) !!}
</div>


<!-- Equipment Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('equipment_id', __('Equipment Id').':') !!}
    {!! Form::select('equipment_id', \App\Models\Equipment::pluck('title','id') ,null, ['class' => 'form-control']) !!}
</div>

<!-- Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('num', __('Num').':') !!}
    {!! Form::number('num', null, ['class' => 'form-control']) !!}
</div>

<!-- Unit Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unit_price', __('Unit Price').':') !!}
    {!! Form::number('unit_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6 sr-only">
    {!! Form::label('status', __('Status').':') !!}
    {!! Form::text('status', '1' , ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orderdetails.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>
