<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="tickets-table"
           style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
        <th>@lang('Actions')</th>
        <th>@lang('Session Id')</th>
        <th>@lang('User Id')</th>
        <th>@lang('Ip Address')</th>
        <th>@lang('Last Activity')</th>
        <th>@lang('User Agent')</th>
        </thead>
        <tbody>
        @foreach($sessions as $session)

            <tr>
                <td>
                    {!! Form::open(['route' => ['logs.deleteSession', $session->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {!! Form::button('<i class="fa fa-close"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('از عملایات مورد نظر اطمینان دارید؟')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
                <td>{!! $session->id !!}</td>
                <td>{!! $session->user_id===null ? '' : $session->user->name !!}</td>
                <td>{!! $session->ip_address !!}</td>
                <td>{!! jdate($session->last_activity) !!}</td>
                <td>{!! $session->user_agent !!}</td>
                {{--@dd($session)--}}
            </tr>
        @endforeach
        </tbody>
    </table>
</div>