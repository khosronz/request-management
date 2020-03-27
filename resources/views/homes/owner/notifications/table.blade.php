<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="tickets-table"
           style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
        <th>@lang('Notification Id')</th>
        <th>@lang('Type')</th>
        <th>@lang('User Id')</th>
        <th>@lang('Data')</th>
        <th>@lang('Read At')</th>
        <th>@lang('Created At))</th>
        </thead>
        <tbody>
        @foreach($notifications as $notification)
            {{--@dd($session)--}}
            <tr>
                <td>{!! $notification->id !!}</td>
                <td>{!! $notification->type !!}</td>
                <td>{!! $notification->notifiable_id !!}</td>
                <td>{!! $notification->data !!}</td>
                <td>{!! $notification->read_at !!}</td>
                <td>{!! jdate($notification->read_at) !!}</td>
                <td>{!! jdate($notification->created_at) !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>