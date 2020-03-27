<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="tickets-table"
           style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
        <th colspan="3">@lang('Action')</th>
        {{--<th>@lang('Notification Id')</th>--}}
        {{--<th>@lang('Type')</th>--}}
        <th>@lang('User Id')</th>
        <th>@lang('Order Id')</th>
        <th>@lang('Order Status')</th>
        <th>@lang('Read At')</th>
        </thead>
        <tbody>
        @foreach($notifications as $notification)
            @php
                $order=new \App\Models\Order($notification->data['data'])
            @endphp
            <tr>
                <td colspan="3">
                    <a href="#" class="text-success"><i class="fa fa-eye"></i></a>
                </td>
                {{--<td>{!! $notification->id !!}</td>--}}
                {{--<td>{!! $notification->type !!}</td>--}}
                <td>{!! $notification->notifiable->name !!}</td>
                <td>{!! $order->title !!}</td>
                <td>{!! verificationStatus($order->verified) !!}</td>
                <td>{!! $notification->read_at!=null ? jdate($notification->read_at) : $notification->read_at !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>