<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="prefactors-table"
           style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
        <th colspan="4">@lang('Action')</th>
        <th>@lang('User Id')</th>
        <th>@lang('وضعیت پیش فاکتور')</th>
        <th>@lang('وضعیت فاکتور')</th>
        <th>@lang('Order Id')</th>
        <th>@lang('Factory Id')</th>
        </thead>
        <tbody>
        @foreach($prefactors as $prefactor)
            <tr class="{{$prefactor->status==='0'?'text-danger':''}} {{$prefactor->factor_status==='1'?'text-success':''}}">
                <td colspan="4">
                    {!! Form::open(['route' => ['prefactors.destroy', $prefactor->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('prefactors.show', [$prefactor->id]) !!}" class='btn btn-ghost-success'><i
                                    class="fa fa-eye"></i></a>
                        @if(\Illuminate\Support\Facades\Auth::user()->isSupplier())
                            <a href="{!! route('prefactors.edit', [$prefactor->id]) !!}" class='btn btn-ghost-info'><i
                                        class="fa fa-edit"></i></a>
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->isMaster())
                            <a href="{!! route('prefactors.success', [$prefactor->id]) !!}" class='btn btn-ghost-info'><i
                                        class="fa fa-check"></i></a>
                        @endif
                        {!! Form::button('<i class="fa fa-close"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
                <td>{!! $prefactor->user->name !!}</td>
                <td style="text-align: center"><span class="badge {{ $prefactor->status  === '0' ? 'badge-danger' : 'badge-success' }}">{!! $prefactor->status  === '0' ? 'مردود':'تایید' !!}</span></td>
                <td style="text-align: center"><span class="badge {{ $prefactor->factor_status === '1' ? 'badge-success' : 'badge-info' }}">{!! $prefactor->factor_status === '1' ? 'فاکتور':'پیشفاکتور' !!}</span></td>
                <td>{!! $prefactor->order->title !!}</td>
                <td>{!! $prefactor->factory->title !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>