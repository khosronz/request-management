{{--<!-- Category Id Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('category_id', __('Category Id').':') !!}--}}
    {{--{!! Form::select('category_id', \App\Models\Category::Pluck('title','id'),null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}



<div class="container">
    <div class="row">

        <div class="col-sm-12">
            {{--<order-table-component></order-table-component>--}}
            <order-table-filtered-component></order-table-filtered-component>
        </div>
    </div>
</div>

