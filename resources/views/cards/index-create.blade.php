<div id="accordion">
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                <i class="fa fa-plus-square fa-lg mr-2"></i>
                                <strong>@lang('Create Card')</strong>
                            </a>
                        </div>
                        <div class="card-body collapse" id="collapseOne" data-parent="#accordion">
                            <create-order-table-filtered-component :user_id="{{\Illuminate\Support\Facades\Auth::id()}}"></create-order-table-filtered-component>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
