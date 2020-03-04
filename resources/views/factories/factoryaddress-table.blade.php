<div id="accordion">
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapseAddress">
                                <i class="fa fa-plus-square fa-lg mr-2"></i>
                                <strong>@lang('Factory Addresses')</strong>
                            </a>
                        </div>
                        <div class="card-body collapse" id="collapseAddress" data-parent="#accordion">
                            @include('factoryaddresses.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>