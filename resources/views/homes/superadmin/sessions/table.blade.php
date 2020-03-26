<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="tickets-table"
           style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
        <th>@lang('Session Id')</th>
        <th>@lang('User Id')</th>
        <th>@lang('Ip Address')</th>
        <th>@lang('Last Activity')</th>
        <th>@lang('User Agent')</th>
        {{--<th>@lang('Payload')</th>--}}
        </thead>
        <tbody>
        @foreach($sessions as $session)
            {{--@dd($session)--}}
            <tr>
                <td>{!! $session->id !!}</td>
                <td>{!! $session->user->name !!}</td>
                <td>{!! $session->ip_address !!}</td>
                <td>{!! jdate($session->last_activity) !!}</td>
                <td>{!! $session->user_agent !!}</td>
                {{--<td>{!! $session->payload !!}</td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
</div>