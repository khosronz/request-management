<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="orders-table"
           style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
        <th colspan="3">@lang('Action')</th>
        <th>@lang('Title')</th>
        <th>@lang('Verified')</th>
        <th>@lang('User Id')</th>
        <th>@lang('Date ordered')</th>
        <th>@lang('Desc')</th>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td colspan="3">
                    <div class='btn-group'>
                        <a href="{!! route('orders.show', [$order->id]) !!}" class='btn btn-ghost-info'><i
                                    class="fa fa-eye"></i></a>
                        @if($order->verified===\App\Enums\VerifiedType::master_waite)
                            {!! Form::open(['route' => ['orders.success', $order->id], 'method' => 'delete']) !!}
                            <input value="{{$order->id}}" name="id" class="sr-only">
                            {!! Form::button('<i class="fa fa-check"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-success']) !!}
                            {!! Form::close() !!}

                            {!! Form::open(['route' => ['orders.block', $order->id], 'method' => 'delete']) !!}
                            <input value="{{$order->id}}" name="id" class="sr-only">
                            {!! Form::button('<i class="fa fa-close"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </td>
                <td>{!! $order->title !!}</td>
                <td class="{{$order->waite_status===\App\Enums\VerifiedWaiteStatus::waite ? 'text-info' : 'text-danger' }}">{!! verificationStatus($order->verified) !!}</td>
                <td>{!! $order->user->name !!}</td>
                <td>{!! jdate($order->created_at) !!}</td>
                <td>{!! $order->desc !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>