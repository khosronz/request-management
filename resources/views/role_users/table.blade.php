<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="roleUsers-table"
           style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
        <th>@lang('User Id')</th>
        <th>@lang('Role Id')</th>
        <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($roleUsers as $roleUser)
            <tr>
                <td>{!! $roleUser->user->name !!}</td>
                <td>{!! $roleUser->role->title !!}</td>
                <td>
                    {!! Form::open(['route' => ['roleUsers.destroy', $roleUser->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('roleUsers.show', [$roleUser->id]) !!}" class='btn btn-ghost-success'><i
                                    class="fa fa-eye"></i></a>
                        <a href="{!! route('roleUsers.edit', [$roleUser->id]) !!}" class='btn btn-ghost-info'><i
                                    class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>