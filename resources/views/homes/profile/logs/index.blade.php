<div class="container mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>
                        @lang('User') @lang('Logs')
                    </div>
                    <div class="card-body">
                        @php
                            $logs = DB::table('logs')
                                ->where('level', '!=', 'ERROR')
                                ->where('message', 'LIKE', '%'.\Illuminate\Support\Facades\Auth::user()->email.'%')
                                ->orderByDesc('created_at')->get();
                        @endphp

                        <main-logger-user-table-filtered-component :logs="{{$logs}}" :user_id="{{\Illuminate\Support\Facades\Auth::id()}}"></main-logger-user-table-filtered-component>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
