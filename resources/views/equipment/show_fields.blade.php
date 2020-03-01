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
    <p>{!! $equipment->user->name !!}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', __('Category Id').':') !!}
    <p>{!! $equipment->category->title !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! jdate($equipment->created_at) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! jdate($equipment->updated_at) !!}</p>
</div>

