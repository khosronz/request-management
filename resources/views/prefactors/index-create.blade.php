<div id="accordion">
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                <i class="fa fa-plus-square fa-lg mr-2"></i>
                                <strong>@lang('Create Prefactor')</strong>
                            </a>
                        </div>
                        <div class="card-body collapse" id="collapseOne" data-parent="#accordion">
                            {!! Form::open(['route' => 'prefactors.store']) !!}

                            @include('prefactors.fields')

                            <!-- Submit Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
                                <a href="{!! route('prefactors.index') !!}" class="btn btn-default">@lang('Cancel')</a>
                            </div>


                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>