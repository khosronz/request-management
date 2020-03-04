<div class="row">

    <!-- Name Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('name', __('Name').':') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Password Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('password', __('Password').':') !!}
        {!! Form::text('password', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Email Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('email', __('Email').':') !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Fname Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('fname', __('Fname').':') !!}
        {!! Form::text('fname', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Lname Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('lname', __('Lname').':') !!}
        {!! Form::text('lname', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Desc Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('desc', __('Desc').':') !!}
        {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Factory Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('factory', __('Factory').':') !!}
        {!! Form::text('factory', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Province Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('province', __('Province').':') !!}
        {!! Form::text('province', null, ['class' => 'form-control']) !!}
    </div>
    <!-- City Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('city', __('City').':') !!}
        {!! Form::text('city', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Phone Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('phone', __('Phone').':') !!}
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Pre_phone Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('pre_phone', __('Pre_phone').':') !!}
        {!! Form::text('pre_phone', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Country Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('country', __('Country').':') !!}
        {!! Form::text('country', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Address1 Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('address1', __('Address1').':') !!}
        {!! Form::textarea('address1', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Address2 Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('address2', __('Address2').':') !!}
        {!! Form::textarea('address2', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('users.index') !!}" class="btn btn-default">@lang('Cancel')</a>
    </div>

</div>