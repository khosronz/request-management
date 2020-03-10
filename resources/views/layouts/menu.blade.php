 {{--Initial Information--}}
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa  fa-cogs"></i>
        @lang('Initial Information')
    </a>
    <ul class="nav-dropdown-items">
        <li class="nav-item {{ Request::is('organizations*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('organizations.index') !!}">
                <i class="nav-icon fa fa-university"></i>
                <span>@lang('Organizations')</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('categories*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('categories.index') !!}">
                <i class="nav-icon fa fa-list-alt"></i>
                <span>@lang('Categories')</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('organizationCategories*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('organizationCategories.index') !!}">
                <i class="nav-icon icon-cursor"></i>
                <span>@lang('Organization Categories')</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('equipment*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('equipment.index') !!}">
                <i class="nav-icon fa fa-desktop"></i>
                <span>@lang('Equipment')</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('roles.index') !!}">
                <i class="nav-icon icon-people"></i>
                <span>@lang('Roles')</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('users.index') !!}">
                <i class="nav-icon fa fa-university"></i>
                <span>@lang('Users')</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('severities*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('severities.index') !!}">
                <i class="nav-icon icon-layers"></i>
                <span>@lang('Severities')</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('telltypes*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('telltypes.index') !!}">
                <i class="nav-icon fa fa-address-card-o"></i>
                <span>@lang('Telltypes')</span>
            </a>
        </li>
        {{--<li class="nav-item {{ Request::is('factorytells*') ? 'active' : '' }}">--}}
            {{--<a class="nav-link" href="{!! route('factorytells.index') !!}">--}}
                {{--<i class="nav-icon fa fa-phone-square"></i>--}}
                {{--<span>@lang('Factorytells')</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="nav-item {{ Request::is('factoryaddresses*') ? 'active' : '' }}">--}}
            {{--<a class="nav-link" href="{!! route('factoryaddresses.index') !!}">--}}
                {{--<i class="nav-icon fa  fa-map-marker"></i>--}}
                {{--<span>@lang('Factoryaddresses')</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        <li class="nav-item {{ Request::is('factories*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('factories.index') !!}">
                <i class="nav-icon fa fa-briefcase"></i>
                <span>@lang('Factories')</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('media*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('media.index') !!}">
                <i class="nav-icon fa fa-file-text-o"></i>
                <span>@lang('Media')</span>
            </a>
        </li>
        {{--<li class="nav-item {{ Request::is('organizationUsers*') ? 'active' : '' }}">--}}
            {{--<a class="nav-link" href="{!! route('organizationUsers.index') !!}">--}}
                {{--<i class="nav-icon icon-cursor"></i>--}}
                {{--<span>@lang('Organization Users')</span>--}}
            {{--</a>--}}
        {{--</li>--}}
    </ul>
</li>
 {{--Dashboards--}}
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-tachometer"></i>
        @lang('Dashboards')
    </a>
    <ul class="nav-dropdown-items">
        <li class="nav-item {{ Request::is('financial*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('financial.index') !!}">
                <i class="nav-icon fa fa-angle-double-left"></i>
                <span>@lang('Financial Dashboard')</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('protection*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('protection.index') !!}">
                <i class="nav-icon fa fa-angle-double-left"></i>
                <span>@lang('Protection Dashboard')</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('owner*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('owner.index') !!}">
                <i class="nav-icon fa fa-angle-double-left"></i>
                <span>@lang('Owner Dashboard')</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('support*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('support.index') !!}">
                <i class="nav-icon fa fa-angle-double-left"></i>
                <span>@lang('Support Dashboard')</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('successor*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('successor.index') !!}">
                <i class="nav-icon fa fa-angle-double-left"></i>
                <span>@lang('Successor Dashboard')</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('master*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('master.index') !!}">
                <i class="nav-icon fa fa-angle-double-left"></i>
                <span>@lang('Master Dashboard')</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('supplier*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('supplier.index') !!}">
                <i class="nav-icon fa fa-angle-double-left"></i>
                <span>@lang('Supplier Dashboard')</span>
            </a>
        </li>

    </ul>
</li>

 <li class="nav-item nav-dropdown">
     <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-tachometer"></i>
         @lang('Orders')
     </a>
     <ul class="nav-dropdown-items">

         <li class="nav-item {{ Request::is('orders*') ? 'active' : '' }}">
             <a class="nav-link" href="{!! route('orders.index') !!}">
                 <i class="nav-icon fa fa-cart-arrow-down"></i>
                 <span>@lang('Orders')</span>
             </a>
         </li>
         <li class="nav-item {{ Request::is('owners/create*') ? 'active' : '' }}">
             <a class="nav-link" href="{!! route('cards.index') !!}">
                 <i class="nav-icon fa fa-cart-arrow-down"></i>
                 <span>@lang('New Orders')</span>
             </a>
         </li>
     </ul>
 </li>


 <li class="nav-item {{ Request::is('tickets*') ? 'active' : '' }}">
     <a class="nav-link" href="{!! route('tickets.index') !!}">
         <i class="nav-icon fa fa-comments-o"></i>
         <span>@lang('Tickets')</span>
     </a>
 </li>
{{--<li class="nav-item {{ Request::is('messages*') ? 'active' : '' }}">--}}
    {{--<a class="nav-link" href="{!! route('messages.index') !!}">--}}
        {{--<i class="nav-icon cui-paper-plane"></i>--}}
        {{--<span>@lang('Messages')</span>--}}
    {{--</a>--}}
{{--</li>--}}
{{--<li class="nav-item {{ Request::is('orderdetails*') ? 'active' : '' }}">--}}
    {{--<a class="nav-link" href="{!! route('orderdetails.index') !!}">--}}
        {{--<i class="nav-icon icon-cursor"></i>--}}
        {{--<span>@lang('Orderdetails')</span>--}}
    {{--</a>--}}
{{--</li>--}}
{{--<li class="nav-item {{ Request::is('cards*') ? 'active' : '' }}">--}}
    {{--<a class="nav-link" href="{!! route('cards.index') !!}">--}}
        {{--<i class="nav-icon icon-cursor"></i>--}}
        {{--<span>@lang('Cards')</span>--}}
    {{--</a>--}}
{{--</li>--}}

{{--<li class="nav-item {{ Request::is('roleUsers*') ? 'active' : '' }}">--}}
    {{--<a class="nav-link" href="{!! route('roleUsers.index') !!}">--}}
        {{--<i class="nav-icon icon-cursor"></i>--}}
        {{--<span>@lang('Role Users')</span>--}}
    {{--</a>--}}
{{--</li>--}}
{{--<li class="nav-item {{ Request::is('protectionCategories*') ? 'active' : '' }}">--}}
    {{--<a class="nav-link" href="{!! route('protectionCategories.index') !!}">--}}
        {{--<i class="nav-icon icon-cursor"></i>--}}
        {{--<span>@lang('Protection Categories')</span>--}}
    {{--</a>--}}
{{--</li>--}}<li class="nav-item {{ Request::is('prefactors*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('prefactors.index') !!}">
        <i class="nav-icon icon-cursor"></i>
        <span>@lang('Prefactors')</span>
    </a>
</li>

<li class="nav-item {{ Request::is('prefactorDetails*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('prefactorDetails.index') !!}">
        <i class="nav-icon icon-cursor"></i>
        <span>@lang('Prefactor Details')</span>
    </a>
</li>
