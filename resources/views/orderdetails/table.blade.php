<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="orderdetails-table" style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
            <th class="sr-only">@lang('Status')</th>
        <th>@lang('Equipment Id')</th>
        <th>@lang('Num')</th>
        <th>@lang('Unit Price')</th>
        <th>@lang('Order Id')</th>
        <th>@lang('User Id')</th>
            <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($orderdetails as $orderdetail)
            <tr>
                <td class="sr-only">{!! $orderdetail->status ? 'فعال' : 'غیرفعال' !!}</td>
            <td>{!! $orderdetail->equipment->title !!}</td>
            <td>{!! $orderdetail->num !!}</td>
            <td>{!! $orderdetail->unit_price !!}</td>
            <td>{!! $orderdetail->order->title !!}</td>
            <td>{!! $orderdetail->user->name !!}</td>
                <td>
                    {!! Form::open(['route' => ['orderdetails.destroy', $orderdetail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('orderdetails.show', [$orderdetail->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('orderdetails.edit', [$orderdetail->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>