<div class="row">
    <!-- Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('id', __('Id').':') !!}
        <p>{!! $prefactor->id !!}</p>
    </div>

    <!-- User Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('user_id', __('User Id').':') !!}
        <p>{!! $prefactor->user->title !!}</p>
    </div>

    <!-- Order Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('order_id', __('Order Id').':') !!}
        <p>{!! $prefactor->order->title !!}</p>
    </div>

    <!-- Factory Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('factory_id', __('Factory Id').':') !!}
        <p>{!! $prefactor->factory->title !!}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('created_at', __('Created At').':') !!}
        <p>{!! jdate($prefactor->created_at) !!}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('updated_at', __('Updated At').':') !!}
        <p>{!! jdate($prefactor->updated_at) !!}</p>
    </div>


</div>