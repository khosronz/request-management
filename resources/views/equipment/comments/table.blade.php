<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="comments-table" style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
            <th>@lang('Equipment Id')</th>
        <th>@lang('User Id')</th>
        <th>@lang('Title')</th>
        <th>@lang('Desc')</th>
        <th>@lang('User Ip Address')</th>
        <th>@lang('Email')</th>
        <th>@lang('Parent Id')</th>
        <th>@lang('Status')</th>
            <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>{!! $comment->equipment->title !!}</td>
            <td>{!! $comment->user->name !!}</td>
            <td>{!! $comment->title !!}</td>
            <td>{!! $comment->desc !!}</td>
            <td>{!! $comment->user_ip_address !!}</td>
            <td>{!! $comment->email !!}</td>
            <td>{!! $comment->parent_id != 0 ? $comment->parent->title : 'اصلی' !!}</td>
            <td>@lang($comment->status)</td>
                <td>
                    {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('comments.show', [$comment->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('comments.edit', [$comment->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>