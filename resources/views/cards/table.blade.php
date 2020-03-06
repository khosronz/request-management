<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="cards-table" style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
            <th>@lang('Equipment Id')</th>
            <th>@lang('User Id')</th>
        <th>@lang('Num')</th>
            <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($cards as $card)
            <tr>
                <td>{!! $card->equipment->title !!}</td>
                <td>{!! $card->user->name !!}</td>
            <td>{!! $card->num !!}</td>
                <td>
                    {!! Form::open(['route' => ['cards.destroy', $card->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('cards.show', [$card->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('cards.edit', [$card->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>