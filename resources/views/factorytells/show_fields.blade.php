<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $factorytell->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('Title').':') !!}
    <p>{!! $factorytell->title !!}</p>
</div>

<!-- Tellnumber Field -->
<div class="form-group">
    {!! Form::label('tellnumber', __('Tellnumber').':') !!}
    <p>{!! $factorytell->tellnumber !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group">
    {!! Form::label('desc', __('Desc').':') !!}
    <p>{!! $factorytell->desc !!}</p>
</div>

<!-- Factory Id Field -->
<div class="form-group">
    {!! Form::label('factory_id', __('Factory Id').':') !!}
    <p>{!! $factorytell->factory_id !!}</p>
</div>

<!-- Telltype Id Field -->
<div class="form-group">
    {!! Form::label('telltype_id', __('Telltype Id').':') !!}
    <p>{!! $factorytell->telltype_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! jdate($factorytell->created_at) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! jdate($factorytell->updated_at) !!}</p>
</div>

