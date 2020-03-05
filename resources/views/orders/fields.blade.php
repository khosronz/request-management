<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('Title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Verified Field -->
<div class="form-group col-sm-6 sr-only">
    {!! Form::label('verified', __('Verified').':') !!}
    {!! Form::text('verified', \App\Enums\VerifiedType::owner_waite, ['class' => 'form-control']) !!}
</div>
{{--<!-- Verified Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('verified', __('Verified').':') !!}--}}
    {{--{!! Form::select('verified', getVerificationStatusArray() ,null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('desc', __('Desc').':') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>

@if(Request::is('orders'))
    <!-- User Id Field -->
    <div class="form-group col-sm-6 sr-only">
        {!! Form::label('user_id', __('User Id').':') !!}
        {!! Form::text('user_id', \Illuminate\Support\Facades\Auth::id(), ['class' => 'form-control']) !!}
    </div>
@endif
@if(Request::is('orders/*/edit'))
    <!-- User Id Field -->
    <div class="form-group col-sm-6 sr-only">
        {!! Form::label('user_id', __('User Id').':') !!}
        {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
    </div>
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orders.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>
