
{!! Form::open(['route' => 'prefactors.store']) !!}

   @include('prefactors.fields')

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <!-- <a href="{!! route('prefactors.index') !!}" class="btn btn-default">@lang('Cancel')</a> -->
</div>


{!! Form::close() !!}