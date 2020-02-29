<div id="accordion">
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapseTable">
                                <i class="fa fa-plus-square fa-lg mr-2"></i>
                                <strong>@lang('List of Messages')</strong>
                            </a>
                        </div>
                        <div class="card-body collapse" id="collapseTable" data-parent="#accordion">
                            <div class="table-responsive-sm">
                                <table class="table table-responsive table-bordered table-striped" id="tickets-table"
                                       style="display: block;overflow-x: auto; white-space: nowrap;">
                                    <thead>
                                    <th>@lang('Title')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Ticket Id')</th>
                                    <th>@lang('User Id')</th>
                                    <th>@lang('Desc')</th>
                                    <th colspan="3">@lang('Action')</th>
                                    </thead>
                                    <tbody>
                                    @php
                                        $messages=$ticket->messages
                                    @endphp
                                    @foreach($messages as $message)
                                        <tr>
                                            <td>{!! $message->title !!}</td>
                                            <td>{!! $message->status ? 'باز' : 'بسته' !!}</td>
                                            <td>{!! $message->ticket->title !!}</td>
                                            <td>{!! $message->user->name !!}</td>
                                            <td>{!! $message->desc !!}</td>
                                            <td>
                                                {!! Form::open(['route' => ['messages.destroy', $message->id], 'method' => 'delete']) !!}
                                                <div class='btn-group'>
                                                    <a href="{!! route('messages.show', [$message->id]) !!}"
                                                       class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                                                    <a href="{!! route('messages.edit', [$message->id]) !!}"
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>