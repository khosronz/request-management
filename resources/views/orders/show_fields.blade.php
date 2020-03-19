<div class="row">
    <!-- Id Field -->
    <div class="form-group col-sm-4 sr-only">
        {!! Form::label('id', __('Id').':') !!}
        <p>{!! $order->id !!}</p>
    </div>

    <!-- Title Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('title', __('Title').':') !!}
        <p>{!! $order->title !!}</p>
    </div>

    <!-- Verified Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('verified', __('Verified').':') !!}
        <p>{!! verificationStatus($order->verified) !!}</p>
    </div>

    <!-- User Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('user_id', __('User Id').':') !!}
        <p>{!! $order->user->name !!}</p>
    </div>

    <!-- Desc Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('desc', __('Desc').':') !!}
        <p>{!! $order->desc !!}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('created_at', __('Created At').':') !!}
        <p>{!! jdate($order->created_at) !!}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('updated_at', __('Updated At').':') !!}
        <p>{!! jdate($order->updated_at) !!}</p>
    </div>


</div>