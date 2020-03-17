<div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-warning">
        <div class="card-body pb-0">
            <div class="btn-group float-right">
                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-settings"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{!! route('tickets.index') !!}">@lang('Tickets')</a>
                </div>
            </div>
            <div class="text-value">{{count(\Illuminate\Support\Facades\Auth::user()->tickets)}}</div>
            <div>@lang('All Tickets')</div>
        </div>
        <div class="chart-wrapper mt-3 mx-3" style="height:70px;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas class="chart chartjs-render-monitor" id="card-chart1" height="87" width="322" style="display: block; height: 70px; width: 258px;"></canvas>
            <div id="card-chart1-tooltip" class="chartjs-tooltip top bottom" style="opacity: 0; left: 269.538px; top: 139.722px;"><div class="tooltip-header"><div class="tooltip-header-item">July</div></div><div class="tooltip-body"><div class="tooltip-body-item"><span class="tooltip-body-item-color" style="background-color: rgb(0, 165, 224);"></span><span class="tooltip-body-item-label">My First dataset</span><span class="tooltip-body-item-value">40</span></div></div></div></div>
    </div>
</div>

<div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-info">
        <div class="card-body pb-0">
            <div class="btn-group float-right">
                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-settings"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{!! route('orders.index') !!}">@lang('orders')</a>
                </div>
            </div>
            <div class="text-value">{{count(\Illuminate\Support\Facades\Auth::user()->orders)}}</div>
            <div>@lang('order counter')</div>
        </div>
        <div class="chart-wrapper mt-3 mx-3" style="height:70px;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas class="chart chartjs-render-monitor" id="card-chart2" height="87" width="322" style="display: block; height: 70px; width: 258px;"></canvas>
            <div id="card-chart2-tooltip" class="chartjs-tooltip top" style="opacity: 0; left: 145.538px; top: 117.163px;"><div class="tooltip-header"><div class="tooltip-header-item">April</div></div><div class="tooltip-body"><div class="tooltip-body-item"><span class="tooltip-body-item-color" style="background-color: rgb(38, 203, 253);"></span><span class="tooltip-body-item-label">My First dataset</span><span class="tooltip-body-item-value">17</span></div></div></div></div>
    </div>
</div>

<div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-green">
        <div class="card-body pb-0">
            <div class="btn-group float-right">
                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-settings"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">@lang('Action')</a>
                    <a class="dropdown-item" href="#">@lang('Another action')</a>
                    <a class="dropdown-item" href="#">@lang('Something else here')</a>
                </div>
            </div>
            <div class="text-value">9.823</div>
            <div>@lang('Members online')</div>
        </div>
        <div class="chart-wrapper mt-3" style="height:70px;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas class="chart chartjs-render-monitor" id="card-chart3" height="87" width="362" style="display: block; height: 70px; width: 290px;"></canvas>
        </div>
    </div>
</div>

<div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-danger">
        <div class="card-body pb-0">
            <div class="btn-group float-right">
                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-settings"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">@lang('Action')</a>
                    <a class="dropdown-item" href="#">@lang('Another action')</a>
                    <a class="dropdown-item" href="#">@lang('Something else here')</a>
                </div>
            </div>
            <div class="text-value">9.823</div>
            <div>@lang('Members online')</div>
        </div>
        <div class="chart-wrapper mt-3 mx-3" style="height:70px;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas class="chart chartjs-render-monitor" id="card-chart4" height="87" width="322" style="display: block; height: 70px; width: 258px;"></canvas>
        </div>
    </div>
</div>
