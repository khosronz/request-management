<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="factorytells-table" style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
            <th>@lang('Title')</th>
            <th>@lang('Telltype Id')</th>
            <th>@lang('Tellnumber')</th>
            <th>@lang('Desc')</th>
            {{--<th>@lang('Factory Id')</th>--}}
            <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($factorytells as $factorytell)
            <tr>
                <td>{!! $factorytell->title !!}</td>
                <td>{!! $factorytell->telltype->title !!}</td>
                <td>{!! $factorytell->tellnumber !!}</td>
                <td>{!! $factorytell->desc !!}</td>
                {{--<td>{!! $factorytell->factory->title !!}</td>--}}
                <td>
                    {!! Form::open(['route' => ['factorytells.destroy', $factorytell->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('factorytells.show', [$factorytell->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('factorytells.edit', [$factorytell->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>