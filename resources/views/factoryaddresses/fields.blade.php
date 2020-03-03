<!-- Factory Id Field -->
<div class="form-group col-sm-6 sr-only">
    {!! Form::label('factory_id', __('Factory Id').':') !!}
    {!! Form::text('factory_id', $factory->id, ['class' => 'form-control']) !!}
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('desc', __('Desc').':') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('factoryaddresses.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>
