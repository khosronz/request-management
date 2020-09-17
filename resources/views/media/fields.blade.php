<!-- User Id Field -->
<div class="form-group col-sm-6 sr-only">
    {!! Form::label('user_id', __('User Id').':') !!}
    {!! Form::text('user_id', \Illuminate\Support\Facades\Auth::id(), ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('Title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('desc', __('Desc').':') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>

<!-- Alt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alt', __('Alt').':') !!}
    {!! Form::text('alt', null, ['class' => 'form-control']) !!}
</div>
<!-- Upload  Field -->
<div class="form-group col-sm-6">
    <label for="media_file">{{__('Media file').':'}}</label>
    <input id="media_file"  name="media_file" type="file" class="form-control-file">
</div>
