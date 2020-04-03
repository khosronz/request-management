<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="cards-table"
           style="display: block;overflow-x: auto; white-space: nowrap;">
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
                        {{--<a href="{!! route('cards.show', [$card->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>--}}
                        {{--<a href="{!! route('cards.edit', [$card->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>--}}
                        <button class='btn btn-ghost-info' data-toggle="modal" data-target="#myModal"><i
                                    class="fa fa-edit"></i></button>
                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">@lang('Change number')</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        @include('cards.modal-edit')
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>