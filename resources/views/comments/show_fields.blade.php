<div class="row">
    <!-- Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('id', __('Id').':') !!}
        <p>{!! $comment->id !!}</p>
    </div>

    <!-- Equipment Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('equipment_id', __('Equipment Id').':') !!}
        <p>{!! $comment->equipment->title !!}</p>
    </div>

    <!-- User Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('user_id', __('User Id').':') !!}
        <p>{!! $comment->user->name !!}</p>
    </div>

    <!-- Title Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('title', __('Title').':') !!}
        <p>{!! $comment->title !!}</p>
    </div>

    <!-- User Ip Address Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('user_ip_address', __('User Ip Address').':') !!}
        <p>{!! $comment->user_ip_address !!}</p>
    </div>

    <!-- Email Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('email', __('Email').':') !!}
        <p>{!! $comment->email !!}</p>
    </div>

    <!-- Parent Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('parent_id', __('Parent Id').':') !!}
        <p>{!! $comment->parent_id != 0 ? $comment->parent->title : 'اصلی' !!}</p>
    </div>

    <!-- Status Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('status', __('Status').':') !!}
        <p>@lang($comment->status)</p>
    </div>

    <!-- Desc Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('desc', __('Desc').':') !!}
        <p>{!! $comment->desc !!}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('created_at', __('Created At').':') !!}
        <p>{!! jdate($comment->created_at) !!}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('updated_at', __('Updated At').':') !!}
        <p>{!! jdate($comment->updated_at) !!}</p>
    </div>


</div>