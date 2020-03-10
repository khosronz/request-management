<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="prefactors-table" style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
            <th>@lang('User Id')</th>
        <th>@lang('Order Id')</th>
        <th>@lang('Factory Id')</th>
            <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($prefactors as $prefactor)
            <tr>
                <td>{!! $prefactor->user->name !!}</td>
            <td>{!! $prefactor->order->title !!}</td>
            <td>{!! $prefactor->factory->title !!}</td>
                <td>
                    {!! Form::open(['route' => ['prefactors.destroy', $prefactor->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('prefactors.show', [$prefactor->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('prefactors.edit', [$prefactor->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>