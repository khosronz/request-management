<div class="row">
    <!-- Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('id', __('Id').':') !!}
        <p>{!! $setting->id !!}</p>
    </div>

    <!-- Title Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('title', __('Title').':') !!}
        <p>{!! $setting->title !!}</p>
    </div>

    <!-- Default Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('default', __('Default').':') !!}
        <p>{!! $setting->default !!}</p>
    </div>

    <!-- User Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('user_id', __('User Id').':') !!}
        <p>{!! $setting->user->name !!}</p>
    </div>

    <!-- Short Code Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('short_code', __('Short Code').':') !!}
        <p>{!! $setting->short_code !!}</p>
    </div>

    <!-- Value Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('value', __('Value').':') !!}
        <p>{!! $setting->value !!}</p>
    </div>

    <!-- Desc Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('desc', __('Desc').':') !!}
        <p>{!! $setting->desc !!}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('created_at', __('Created At').':') !!}
        <p>{!! jdate($setting->created_at) !!}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('updated_at', __('Updated At').':') !!}
        <p>{!! jdate($setting->updated_at) !!}</p>
    </div>


</div>