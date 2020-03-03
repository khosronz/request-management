<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="factoryaddresses-table" style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
            {{--<th>@lang('Factory Id')</th>--}}
        <th>@lang('Desc')</th>
            <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($factoryaddresses as $factoryaddress)
            <tr>
                {{--<td>{!! $factoryaddress->factory->title !!}</td>--}}
            <td>{!! $factoryaddress->desc !!}</td>
                <td>
                    {!! Form::open(['route' => ['factoryaddresses.destroy', $factoryaddress->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('factoryaddresses.show', [$factoryaddress->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('factoryaddresses.edit', [$factoryaddress->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>