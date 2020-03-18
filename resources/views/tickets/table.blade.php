<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="tickets-table"
           style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
        <th colspan="3">@lang('Action')</th>
        <th>@lang('Title')</th>
        <th>@lang('Status')</th>
        <th>@lang('Severity Id')</th>
        <th>@lang('New Messages')</th>
        <th>@lang('Organization Id')</th>
        <th>@lang('User Id')</th>
        <th>@lang('date')</th>
        <th>@lang('Desc')</th>
        </thead>
        <tbody>
        @foreach($tickets as $ticket)
            <tr>
                <td colspan="3">
                    {!! Form::open(['route' => ['tickets.destroy', $ticket->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('tickets.show', [$ticket->id]) !!}" class='btn btn-ghost-success'><i
                                    class="fa fa-eye"></i></a>
                        @if(\Illuminate\Support\Facades\Auth::user()->can('update', $ticket))
                            <a href="{!! route('tickets.edit', [$ticket->id]) !!}" class='btn btn-ghost-info'><i
                                        class="fa fa-edit"></i></a>
                        @endif
                        {!! Form::button('<i class="fa fa-window-close"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('آیا مطمئنید که می خواهید تیکت را ببندید؟')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
                <td>{!! $ticket->title !!}</td>
                <td>{!! $ticket->status ? 'باز' : 'بسته' !!}</td>
                <td>{!! $ticket->severity->title !!}</td>
                <td>{!! count($ticket->messages->where('status',\App\Enums\StatusType::enabled)) !!}</td>
                <td>{!! $ticket->organization->title !!}</td>
                <td>{!! $ticket->user->name !!}</td>
                <td>{!! jdate($ticket->created_at) !!}</td>
                <td>{!! $ticket->desc !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>