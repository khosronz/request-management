<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="categories-table"
           style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
        <th>@lang('Title')</th>
        <th>@lang('Category Visits')</th>
        <th>@lang('Parent Id')</th>
        <th>@lang('User Id')</th>
        <th>@lang('Status')</th>
        <th>@lang('Desc')</th>
        <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{!! $category->title !!}</td>
                <td>{!! $category->category_visits !!}</td>
                <td>{!! $category->parent['title'] !!}</td>
                <td style="text-align: center"><span class="badge {{ $category->status ? 'badge-success' : 'badge-danger' }}">{!! $category->status ? 'فعال' : 'غیرفعال' !!}</span></td>
                <td>{!! $category->user->name !!}</td>
                <td>{!! $category->desc !!}</td>
                <td>
                    {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('categories.show', [$category->id]) !!}" class='btn btn-ghost-success'><i
                                    class="fa fa-eye"></i></a>
                        <a href="{!! route('categories.edit', [$category->id]) !!}" class='btn btn-ghost-info'><i
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