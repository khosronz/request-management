<div class="row">
    <!-- Id Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('id', __('Id').':') !!}
        <p>{!! $user->id !!}</p>
    </div>

    <div class="form-group col-sm-3">
        {!! Form::label('name', __('Name').':') !!}
        <p>{!! $user->name!!}</p>
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('email', __('Email').':') !!}
        <p>{!! $user->email!!}</p>
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('fname', __('Fname').':') !!}
        <p>{!! $user->fname!!}</p>
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('lname', __('Lname').':') !!}
        <p>{!! $user->lname!!}</p>
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('desc', __('Desc').':') !!}
        <p>{!! $user->desc!!}</p>
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('factory', __('Factory').':') !!}
        <p>{!! $user->factory!!}</p>
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('province', __('Province').':') !!}
        <p>{!! $user->province!!}</p>
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('city', __('City').':') !!}
        <p>{!! $user->city!!}</p>
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('phone', __('Phone').':') !!}
        <p>{!! $user->phone!!}</p>
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('pre_phone', __('Pre_phone').':') !!}
        <p>{!! $user->pre_phone!!}</p>
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('country', __('Country').':') !!}
        <p>{!! $user->country!!}</p>
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('Visibility', __('Visibility').':') !!}
        <p>{!! $user->visible_to_everyone ? __('Visible to everyone') : __('Do not visible to everyone') !!}</p>
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('address1', __('Address1').':') !!}
        <p>{!! $user->address1!!}</p>
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('address2', __('Address2').':') !!}
        <p>{!! $user->address2!!}</p>
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('roles', __('Roles').':') !!}
        <p>
            @foreach($user->roles->pluck('title') as $title)
                {!! __($title) . '/' !!}
            @endforeach
        </p>
    </div>



    <!-- Created At Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('created_at', __('Created At').':') !!}
        <p>{!! jdate($user->created_at) !!}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('updated_at', __('Updated At').':') !!}
        <p>{!! jdate($user->updated_at) !!}</p>
    </div>

</div>

