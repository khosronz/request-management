<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="orders-table"
           style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
        <th colspan="3">@lang('Action Prefactor')</th>
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
                    <div class="btn-group">
                        <a href="{!! route('prefactors.createByOrder', [$order->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-paypal"></i></a>
                    </div>
                </td>
                <td>{!! $order->title !!}</td>
                <td class="text-info">{!! verificationStatus($order->verified) !!}</td>
                <td>{!! $order->user->name !!}</td>
                <td>{!! jdate($order->created_at) !!}</td>
                <td>{!! $order->desc !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>