<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('Title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('desc', __('Desc').':') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    @php
        if (\Illuminate\Support\Facades\Auth::user()->isSuperadmin()){
            $categories=\App\Models\Category::pluck('title','id');
        }else{
            $categories=\Illuminate\Support\Facades\Auth::user()->categories()->pluck('title','id');
        }

    @endphp
    {!! Form::label('category_id', __('Category Id').':') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>

<!-- Product Visits Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_visits', __('Product Visits').':') !!}
    {!! Form::number('product_visits', 0, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6 sr-only">
    {!! Form::label('user_id', __('User Id').':') !!}
    {!! Form::text('user_id', \Illuminate\Support\Facades\Auth::id(), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('equipment.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>
