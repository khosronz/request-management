<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', __('Category Id').':') !!}
    {!! Form::select('category_id', \App\Models\Category::Pluck('title','id'),null, ['class' => 'form-control']) !!}
</div>

{{--<div class='btn-group'>--}}
{{--    <a href="{!! route('categories.showproducts', [$category->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--    --}}

{{--    <label class="control-label col-md-3 col-sm-3 col-xs-12">انتخاب <span class="required">ضروری است</span></label>--}}
{{--    <div class="col-md-9 col-sm-9 col-xs-12">--}}
{{--        <select class="form-control" required="required">--}}
{{--            <option value=0>یک گزینه را انتخاب نمایید</option>--}}
{{--            <option value=1>فناوری اطلاعات</option>--}}
{{--            <option value=2>زیر ساخت</option>--}}
{{--            <option value=3>امنیت</option>--}}
{{--            <option value=4>سایر</option>--}}
{{--        </select>--}}
{{--    </div>--}}
{{--</div>--}}
