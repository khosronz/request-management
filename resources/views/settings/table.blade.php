<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="settings-table" style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
            <th>@lang('Title')</th>
        <th>@lang('Default')</th>
        <th>@lang('User Id')</th>
        <th>@lang('Short Code')</th>
        <th>@lang('Value')</th>
        <th>@lang('Desc')</th>
            <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($settings as $setting)
            <tr>
                <td>{!! $setting->title !!}</td>
            <td>{!! $setting->default !!}</td>
            <td>{!! $setting->user->name !!}</td>
            <td>{!! $setting->short_code !!}</td>
            <td>{!! $setting->value !!}</td>
            <td>{!! $setting->desc !!}</td>
                <td>
                    {!! Form::open(['route' => ['settings.destroy', $setting->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('settings.show', [$setting->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('settings.edit', [$setting->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>