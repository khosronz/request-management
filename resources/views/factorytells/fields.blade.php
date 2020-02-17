<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('Title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Tellnumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tellnumber', __('Tellnumber').':') !!}
    {!! Form::text('tellnumber', null, ['class' => 'form-control']) !!}
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('desc', __('Desc').':') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>

<!-- Factory Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('factory_id', __('Factory Id').':') !!}
    {!! Form::text('factory_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Telltype Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telltype_id', __('Telltype Id').':') !!}
    {!! Form::text('telltype_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('factorytells.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>
