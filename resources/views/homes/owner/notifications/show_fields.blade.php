<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $notification->id !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', __('Type').':') !!}
    <p>{!! $notification->type !!}</p>
</div>

<!-- Notifiable Id Field -->
<div class="form-group">
    {!! Form::label('notifiable_id', __('Notifiable Id').':') !!}
    <p>{!!$notification->notifiable->name!!}</p>
</div>

@php
    $order=new \App\Models\Order($notification->data['data'])
@endphp

<!-- Order Title Field -->
<div class="form-group">
    {!! Form::label('title', __('Order Title').':') !!}
    <p>{!!$order->title!!}</p>
</div>

<!-- Verification Status Field -->
<div class="form-group">
    {!! Form::label('verification_status', __('Verification Status').':') !!}
    <p>{!!verificationStatus($order->verified)!!}</p>
</div>

<!-- Read At Field -->
<div class="form-group">
    {!! Form::label('read_at', __('Read At').':') !!}
    <p>{!! $notification->read_at!=null ? jdate($notification->read_at) : $notification->read_at !!}</p>
</div>
