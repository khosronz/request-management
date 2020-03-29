<div class="row">
    <!-- Equipment Id Field -->
    <div class="form-group col-sm-3 sr-only">
        {!! Form::label('equipment_id', __('Equipment Id').':') !!}
        {!! Form::text('equipment_id', $equipment->id , ['class' => 'form-control']) !!}
    </div>

    <!-- User Id Field -->
    <div class="form-group col-sm-3 sr-only">
        {!! Form::label('user_id', __('User Id').':') !!}
        {!! Form::text('user_id', \Illuminate\Support\Facades\Auth::id(), ['class' => 'form-control']) !!}
    </div>

    <!-- Title Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('title', __('Title').':') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <!-- User Ip Address Field -->
    <div class="form-group col-sm-3 sr-only">
        {!! Form::label('user_ip_address', __('User Ip Address').':') !!}
        {!! Form::text('user_ip_address', \Illuminate\Support\Facades\Request::ip(), ['class' => 'form-control']) !!}
    </div>

    <!-- Email Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('email', __('Email').':') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Parent Id Field -->
    @php
        $comments=$equipment->comments->pluck('title','id');
        $comments->prepend('بدون انتخاب نظر',0);
    @endphp
    <div class="form-group col-sm-3">
        {!! Form::label('parent_id', __('Parent Comment Id').':') !!}
        {!! Form::select('parent_id', $comments ,null, ['class' => 'form-control']) !!}
    </div>

    <!-- Status Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('status', __('Status').':') !!}
        {!! Form::select('status', ['Enable' => 'فعال', 'Disable' => 'غیرفعال'] ,null, ['class' => 'form-control']) !!}
    </div>

    <!-- Desc Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('desc', __('Desc').':') !!}
        {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('comments.index') !!}" class="btn btn-default">@lang('Cancel')</a>
    </div>

</div>