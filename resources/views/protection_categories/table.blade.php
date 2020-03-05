<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="protectionCategories-table" style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
            <th>@lang('Category Id')</th>
        <th>@lang('User Id')</th>
            <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($protectionCategories as $protectionCategory)
            <tr>
                <td>{!! $protectionCategory->category->title !!}</td>
            <td>{!! $protectionCategory->user->name !!}</td>
                <td>
                    {!! Form::open(['route' => ['protectionCategories.destroy', $protectionCategory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('protectionCategories.show', [$protectionCategory->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('protectionCategories.edit', [$protectionCategory->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>