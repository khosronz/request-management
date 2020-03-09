<div class="row">
    <!-- Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('id', __('Id').':') !!}
        <p>{!! $orderdetail->id !!}</p>
    </div>

    <!-- Status Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('status', __('Status').':') !!}
        <p>{!! $orderdetail->status ? 'فعال' : 'غیرفعال' !!}</p>
    </div>

    <!-- Equipment Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('equipment_id', __('Equipment Id').':') !!}
        <p>{!! $orderdetail->equipment->title !!}</p>
    </div>

    <!-- Num Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('num', __('Num').':') !!}
        <p>{!! $orderdetail->num !!}</p>
    </div>

    <!-- Unit Price Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('unit_price', __('Unit Price').':') !!}
        <p>{!! $orderdetail->unit_price !!}</p>
    </div>

    <!-- Order Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('order_id', __('Order Id').':') !!}
        <p>{!! $orderdetail->order->title !!}</p>
    </div>

    <!-- User Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('user_id', __('User Id').':') !!}
        <p>{!! $orderdetail->user->name !!}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('created_at', __('Created At').':') !!}
        <p>{!! jdate($orderdetail->created_at) !!}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('updated_at', __('Updated At').':') !!}
        <p>{!! jdate($orderdetail->updated_at) !!}</p>
    </div>


</div>