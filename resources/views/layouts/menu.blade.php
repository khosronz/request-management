<li class="nav-item {{ Request::is('financial*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('financial.index') !!}">
        <i class="nav-icon icon-grid"></i>
        <span>@lang('Financial Dashboard')</span>
    </a>
</li>
<li class="nav-item {{ Request::is('protection*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('protection.index') !!}">
        <i class="nav-icon icon-grid"></i>
        <span>@lang('Protection Dashboard')</span>
    </a>
</li>
<li class="nav-item {{ Request::is('owner*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('owner.index') !!}">
        <i class="nav-icon icon-grid"></i>
        <span>@lang('Owner Dashboard')</span>
    </a>
</li>
<li class="nav-item {{ Request::is('support*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('support.index') !!}">
        <i class="nav-icon icon-grid"></i>
        <span>@lang('Support Dashboard')</span>
    </a>
</li>
<li class="nav-item {{ Request::is('successor*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('successor.index') !!}">
        <i class="nav-icon icon-grid"></i>
        <span>@lang('Successor Dashboard')</span>
    </a>
</li>
<li class="nav-item {{ Request::is('master*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('master.index') !!}">
        <i class="nav-icon icon-grid"></i>
        <span>@lang('Master Dashboard')</span>
    </a>
</li>





<li class="nav-item {{ Request::is('organizations*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('organizations.index') !!}">
        <i class="nav-icon icon-grid"></i>
        <span>@lang('Organizations')</span>
    </a>
</li>
<li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('roles.index') !!}">
        <i class="nav-icon icon-people"></i>
        <span>@lang('Roles')</span>
    </a>
</li>
<li class="nav-item {{ Request::is('severities*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('severities.index') !!}">
        <i class="nav-icon icon-layers"></i>
        <span>@lang('Severities')</span>
    </a>
</li>
<li class="nav-item {{ Request::is('tickets*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('tickets.index') !!}">
        <i class="nav-icon cui-notes"></i>
        <span>@lang('Tickets')</span>
    </a>
</li>
<li class="nav-item {{ Request::is('messages*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('messages.index') !!}">
        <i class="nav-icon cui-paper-plane"></i>
        <span>@lang('Messages')</span>
    </a>
</li>






<li class="nav-item {{ Request::is('equipment*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('equipment.index') !!}">
        <i class="nav-icon icon-cursor"></i>
        <span>@lang('Equipment')</span>
    </a>
</li>
<li class="nav-item {{ Request::is('orders*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('orders.index') !!}">
        <i class="nav-icon icon-cursor"></i>
        <span>@lang('Orders')</span>
    </a>
</li>
