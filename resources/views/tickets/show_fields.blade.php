<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $ticket->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('Title').':') !!}
    <p>{!! $ticket->title !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('Status').':') !!}
    <p>{!! $ticket->status ? 'باز' : 'بسته' !!}</p>
</div>

<!-- Severity Id Field -->
<div class="form-group">
    {!! Form::label('severity_id', __('Severity Id').':') !!}
    <p>{!! $ticket->severity->title !!}</p>
</div>

<!-- Organization Id Field -->
<div class="form-group">
    {!! Form::label('organization_id', __('Organization Id').':') !!}
    <p>{!! $ticket->organization->title !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('User Id').':') !!}
    <p>{!! $ticket->user->name !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group">
    {!! Form::label('desc', __('Desc').':') !!}
    <p>{!! $ticket->desc !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! jdate($ticket->created_at) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! jdate($ticket->updated_at) !!}</p>
</div>


<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="tickets-table"
           style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
        <th>@lang('Title')</th>
        <th>@lang('Status')</th>
        <th>@lang('Ticket Id')</th>
        <th>@lang('User Id')</th>
        <th>@lang('Desc')</th>
        <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @php
            $messages=$ticket->messages
        @endphp
        @foreach($messages as $message)
            <tr>
                <td>{!! $message->title !!}</td>
                <td>{!! $message->status ? 'باز' : 'بسته' !!}</td>
                <td>{!! $message->ticket->title !!}</td>
                <td>{!! $message->user->name !!}</td>
                <td>{!! $message->desc !!}</td>
                <td>
                    {!! Form::open(['route' => ['messages.destroy', $message->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('messages.show', [$message->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('messages.edit', [$message->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

