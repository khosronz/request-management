<div id="accordion">
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapseCreate">
                                <i class="fa fa-plus-square fa-lg mr-2"></i>
                                <strong>@lang('Create Role User')</strong>
                            </a>
                        </div>
                        <div class="card-body collapse" id="collapseCreate" data-parent="#accordion">
                            {!! Form::open(['route' => 'roleUsers.store']) !!}

                            @include('users.user-role-fields')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
