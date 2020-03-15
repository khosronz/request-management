<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $category->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('Title').':') !!}
    <p>{!! $category->title !!}</p>
</div>

<!-- Parent Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('parent_id', __('Parent Id').':') !!}
    <p>{!! $category->parent['title'] !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group">
    {!! Form::label('desc', __('Desc').':') !!}
    <p>{!! $category->desc !!}</p>
</div>

<!-- Category Visits Field -->
<div class="form-group">
    {!! Form::label('category_visits', __('Category Visits').':') !!}
    <p>{!! $category->category_visits !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('User Id').':') !!}
    <p>{!! $category->user_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! jdate($category->created_at) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! jdate($category->updated_at) !!}</p>
</div>

