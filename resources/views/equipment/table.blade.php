<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="equipment-table" style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
            <th>@lang('Title')</th>
        <th>@lang('Desc')</th>
        <th>@lang('Product Visits')</th>
        <th>@lang('User Id')</th>
            <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($equipment as $equipment)
            <tr>
                <td>{!! $equipment->title !!}</td>
            <td>{!! $equipment->desc !!}</td>
            <td>{!! $equipment->product_visits !!}</td>
            <td>{!! $equipment->user_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['equipment.destroy', $equipment->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('equipment.show', [$equipment->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('equipment.edit', [$equipment->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>