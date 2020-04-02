<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="users-table" style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
        <th>@lang('Id')</th>
        <th>@lang('Name')</th>
        <th>@lang('Email')</th>
        <th>@lang('Fname')</th>
        <th>@lang('Lname')</th>
        <th>@lang('Roles')</th>
        {{--<th>@lang('Desc')</th>--}}
        {{--<th>@lang('Factory')</th>--}}
        {{--<th>@lang('Province')</th>--}}
        {{--<th>@lang('City')</th>--}}
        {{--<th>@lang('Phone')</th>--}}
        {{--<th>@lang('Pre_phone')</th>--}}
        {{--<th>@lang('Country')</th>--}}
        {{--<th>@lang('Address1')</th>--}}
        {{--<th>@lang('Address2')</th>--}}
            <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{!! $user->id !!}</td>
                <td>{!! $user->name !!}</td>
                <td>{!! $user->email !!}</td>
                <td>{!! $user->fname !!}</td>
                <td>{!! $user->lname !!}</td>
                <td>
                    @foreach($user->roles->pluck('title') as $title)
                        {!! __($title) . '/' !!}
                    @endforeach
                </td>
                {{--<td>{!! $user->desc !!}</td>--}}
                {{--<td>{!! $user->factory !!}</td>--}}
                {{--<td>{!! $user->province !!}</td>--}}
                {{--<td>{!! $user->city !!}</td>--}}
                {{--<td>{!! $user->phone !!}</td>--}}
                {{--<td>{!! $user->pre_phone !!}</td>--}}
                {{--<td>{!! $user->country !!}</td>--}}
                {{--<td>{!! $user->address1 !!}</td>--}}
                {{--<td>{!! $user->address2 !!}</td>--}}
                <td>
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>