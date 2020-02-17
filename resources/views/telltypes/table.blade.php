<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="telltypes-table" style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
            <th>@lang('Title')</th>
        <th>@lang('Desc')</th>
            <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($telltypes as $telltype)
            <tr>
                <td>{!! $telltype->title !!}</td>
            <td>{!! $telltype->desc !!}</td>
                <td>
                    {!! Form::open(['route' => ['telltypes.destroy', $telltype->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('telltypes.show', [$telltype->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('telltypes.edit', [$telltype->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>