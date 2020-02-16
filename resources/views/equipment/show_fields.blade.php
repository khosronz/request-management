<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $equipment->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('Title').':') !!}
    <p>{!! $equipment->title !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group">
    {!! Form::label('desc', __('Desc').':') !!}
    <p>{!! $equipment->desc !!}</p>
</div>

<!-- Product Visits Field -->
<div class="form-group">
    {!! Form::label('product_visits', __('Product Visits').':') !!}
    <p>{!! $equipment->product_visits !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('User Id').':') !!}
    <p>{!! $equipment->user_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! $equipment->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! $equipment->updated_at !!}</p>
</div>

