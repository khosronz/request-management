<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('User Id').':') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
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

<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', __('Url').':') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>
<!-- Upload File -->
<div>
    <?php
    echo Form::open(array('url' => '/uploadfile','files'=>'true'));
    echo 'لطفا فایل را برای بارگزاری انتخاب نمائید.';
    echo Form::file('image');
    echo Form::submit('بارگزاری فایل');
    echo Form::close();
    ?>
</div>
<br><br>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('media.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>

