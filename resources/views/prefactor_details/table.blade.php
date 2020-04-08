<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="prefactorDetails-table"
           style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
        <th colspan="3">@lang('Action')</th>
        <th>@lang('Equipment Id')</th>
        <th>@lang('Num')</th>
        <th>@lang('Unit Price')</th>
        <th>@lang('Prefactor Id')</th>
        <th>@lang('User Id')</th>
        </thead>
        <tbody>
        @foreach($prefactorDetails as $prefactorDetail)
            <tr>
                <td colspan="3">
                    {!! Form::open(['route' => ['prefactorDetails.destroy', $prefactorDetail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('prefactorDetails.show', [$prefactorDetail->id]) !!}"
                           class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        {{--<a href="{!! route('prefactorDetails.edit', [$prefactorDetail->id]) !!}"--}}
                           {{--class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>--}}
                        <button class='btn btn-ghost-info' data-toggle="modal" data-target="#myModal-{{$prefactorDetail->id}}"><i
                                    class="fa fa-edit"></i></button>
                        <!-- The Modal -->
                        <div class="modal" id="myModal-{{$prefactorDetail->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">@lang('Get the price')</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        @include('prefactor_details.modal-edit')
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('Close')</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
                <td>{!! $prefactorDetail->equipment->title !!}</td>
                <td>{!! $prefactorDetail->num !!}</td>
                <td>{!! $prefactorDetail->unit_price !!}</td>
                <td>{!! $prefactorDetail->prefactor_id !!}</td>
                <td>{!! $prefactorDetail->user->name !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>