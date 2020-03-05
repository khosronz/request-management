<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', __('Category Id').':') !!}
    {!! Form::select('category_id', \App\Models\Category::pluck('title','id') ,null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6 sr-only">
    {!! Form::label('user_id', __('User Id').':') !!}
    {!! Form::text('user_id', \Illuminate\Support\Facades\Auth::id(), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('protectionCategories.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>
