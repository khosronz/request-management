<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="prefactorDetails-table" style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
        <th>@lang('Equipment Id')</th>
        <th>@lang('Num')</th>
        <th>@lang('Unit Price')</th>
        <th>@lang('Prefactor Id')</th>
        <th>@lang('User Id')</th>
            <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($prefactorDetails as $prefactorDetail)
            <tr>
            <td>{!! $prefactorDetail->equipment->title !!}</td>
            <td>{!! $prefactorDetail->num !!}</td>
            <td>{!! $prefactorDetail->unit_price !!}</td>
            <td>{!! $prefactorDetail->prefactor_id !!}</td>
            <td>{!! $prefactorDetail->user->name !!}</td>
                <td>
                    {!! Form::open(['route' => ['prefactorDetails.destroy', $prefactorDetail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('prefactorDetails.show', [$prefactorDetail->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('prefactorDetails.edit', [$prefactorDetail->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>