<!-- Equipment Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('equipment_id', __('Equipment Id').':') !!}
    {!! Form::select('equipment_id', \App\Models\Equipment::pluck('title','id'), null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('User Id').':') !!}
    {!! Form::select('user_id', \App\User::pluck('name','id'), null, ['class' => 'form-control']) !!}
</div>

<!-- Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('num', __('Num').':') !!}
    {!! Form::text('num', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cards.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>
