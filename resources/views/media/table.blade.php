<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="media-table" style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
            <th>@lang('User Id')</th>
        <th>@lang('Title')</th>
        <th>@lang('Desc')</th>
        <th>@lang('Alt')</th>
        <th>@lang('Url')</th>
            <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($media as $media)
            <tr>
                <td>{!! $media->user_id !!}</td>
            <td>{!! $media->title !!}</td>
            <td>{!! $media->desc !!}</td>
            <td>{!! $media->alt !!}</td>
            <td>{!! $media->url !!}</td>
                <td>
                    {!! Form::open(['route' => ['media.destroy', $media->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('media.show', [$media->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('media.edit', [$media->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>