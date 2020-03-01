<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $order->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('Title').':') !!}
    <p>{!! $order->title !!}</p>
</div>

<!-- Verified Field -->
<div class="form-group">
    {!! Form::label('verified', __('Verified').':') !!}
    <p>{!! $order->verified !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group">
    {!! Form::label('desc', __('Desc').':') !!}
    <p>{!! $order->desc !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('User Id').':') !!}
    <p>{!! $order->user_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! jdate($order->created_at) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! jdate($order->updated_at) !!}</p>
</div>

