<!-- User Id Field -->
<div class="form-group col-sm-6 sr-only">
    {!! Form::label('user_id', __('User Id').':') !!}
    {!! Form::text('user_id', \Illuminate\Support\Facades\Auth::id(), ['class' => 'form-control']) !!}
</div>

<!-- Order Id Field -->
<div class="form-group col-sm-6 sr-only">
    {!! Form::label('order_id', __('Order Id').':') !!}
    {!! Form::text('order_id', $order->id, ['class' => 'form-control']) !!}
{{--    {!! Form::select('order_id', \App\Models\Order::pluck('title','id'), null, ['class' => 'form-control']) !!}--}}
</div>

<!-- Factory Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('factory_id', __('Factory Id').':') !!}
    {!! Form::select('factory_id',\App\Models\Factory::pluck('title','id'), null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('prefactors.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>
