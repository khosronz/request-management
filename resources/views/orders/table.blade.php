<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="orders-table" style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
            <th>@lang('Title')</th>
        <th>@lang('Verified')</th>
        <th>@lang('Desc')</th>
        <th>@lang('User Id')</th>
            <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{!! $order->title !!}</td>
            <td>{!! $order->verified !!}</td>
            <td>{!! $order->desc !!}</td>
            <td>{!! $order->user_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('orders.show', [$order->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('orders.edit', [$order->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>