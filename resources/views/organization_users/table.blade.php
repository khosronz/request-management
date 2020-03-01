<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="organizationUsers-table" style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
            <th>@lang('User Id')</th>
        <th>@lang('Organization Id')</th>
            <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($organizationUsers as $organizationUser)
            <tr>
                <td>{!! $organizationUser->user->name !!}</td>
            <td>{!! $organizationUser->organization->title !!}</td>
                <td>
                    {!! Form::open(['route' => ['organizationUsers.destroy', $organizationUser->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('organizationUsers.show', [$organizationUser->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('organizationUsers.edit', [$organizationUser->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>