<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $card->id !!}</p>
</div>

<!-- Equipment Id Field -->
<div class="form-group">
    {!! Form::label('equipment_id', __('Equipment Id').':') !!}
    <p>{!! $card->equipment_id !!}</p>
</div>

<!-- Num Field -->
<div class="form-group">
    {!! Form::label('num', __('Num').':') !!}
    <p>{!! $card->num !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! jdate($card->created_at) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! jdate($card->updated_at) !!}</p>
</div>

