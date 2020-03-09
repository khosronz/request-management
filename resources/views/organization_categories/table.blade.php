<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="organizationCategories-table"
           style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
        <th>@lang('User Id')</th>
        <th>@lang('Category Id')</th>
        <th>@lang('Organization Id')</th>
        <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($organizationCategories as $organizationCategory)
            <tr>
                <td>{!! $organizationCategory->user->name !!}</td>
                <td>{!! $organizationCategory->category->title !!}</td>
                <td>{!! $organizationCategory->organization->title !!}</td>
                <td>
                    {!! Form::open(['route' => ['organizationCategories.destroy', $organizationCategory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('organizationCategories.show', [$organizationCategory->id]) !!}"
                           class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('organizationCategories.edit', [$organizationCategory->id]) !!}"
                           class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>