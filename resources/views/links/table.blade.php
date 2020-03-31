<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="links-table" style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
            <th>@lang('Title')</th>
        <th>@lang('Url')</th>
        <th>@lang('Expression')</th>
        <th>@lang('Desc')</th>
        <th>@lang('User Id')</th>
            <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($links as $link)
            <tr>
                <td>{!! $link->title !!}</td>
            <td>{!! $link->url !!}</td>
            <td>{!! $link->expression !!}</td>
            <td>{!! $link->desc !!}</td>
            <td>{!! $link->user_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['links.destroy', $link->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('links.show', [$link->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('links.edit', [$link->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>