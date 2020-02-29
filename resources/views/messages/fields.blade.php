<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('Title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6 sr-only">
    {!! Form::label('status', __('Status').':') !!}
    {!! Form::select('status', [\App\Enums\TicketStatus::open => 'باز',\App\Enums\TicketStatus::close => 'بسته'], null, ['class' => 'form-control']) !!}
</div>

<!-- Ticket Id Field -->
<div class="form-group col-sm-6 sr-only">
    {!! Form::label('ticket_id', __('Ticket Id').':') !!}
    {!! Form::text('ticket_id', $ticket->id ?? '', ['class' => 'form-control']) !!}
{{--    {!! Form::select('ticket_id', \App\Models\Ticket::pluck('title','id'),null, ['class' => 'form-control']) !!}--}}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6 sr-only">
    {!! Form::label('user_id', __('User Id').':') !!}
    {!! Form::text('user_id', \Illuminate\Support\Facades\Auth::id(), ['class' => 'form-control']) !!}
{{--    {!! Form::select('user_id', \App\User::pluck('name','id'),null, ['class' => 'form-control']) !!}--}}
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('desc', __('Desc').':') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('messages.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>
