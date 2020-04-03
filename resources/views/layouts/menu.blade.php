{{--Initial Information--}}
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa  fa-cogs"></i>
        @lang('Initial Information')
    </a>
    <ul class="nav-dropdown-items">
        @can('viewAny',\App\Models\Organization::class)
            <li class="nav-item {{ Request::is('organizations*') ? 'active' : '' }}">
                <a class="nav-link" href="{!! route('organizations.index') !!}">
                    <i class="nav-icon fa fa-university"></i>
                    <span>@lang('Organizations')</span>
                </a>
            </li>
        @endcan
        @can('viewAny',\App\Models\Category::class)
            <li class="nav-item {{ Request::is('categories*') ? 'active' : '' }}">
                <a class="nav-link" href="{!! route('categories.index') !!}">
                    <i class="nav-icon fa fa-list-alt"></i>
                    <span>@lang('Categories')</span>
                </a>
            </li>
        @endcan
        @can('viewAny',\App\Models\OrganizationCategory::class)
            <li class="nav-item {{ Request::is('organizationCategories*') ? 'active' : '' }}">
                <a class="nav-link" href="{!! route('organizationCategories.index') !!}">
                    <i class="nav-icon icon-cursor"></i>
                    <span>@lang('Organization Categories')</span>
                </a>
            </li>
        @endcan
        @can('viewAny',\App\Models\Equipment::class)
                <li class="nav-item {{ Request::is('equipment*') ? 'active' : '' }}">
                    <a class="nav-link" href="{!! route('equipment.index') !!}">
                        <i class="nav-icon fa fa-desktop"></i>
                        <span>@lang('Equipment')</span>
                    </a>
                </li>
        @endcan

        @can('viewAny',\App\Models\Role::class)
            <li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
                <a class="nav-link" href="{!! route('roles.index') !!}">
                    <i class="nav-icon icon-people"></i>
                    <span>@lang('Roles')</span>
                </a>
            </li>
        @endcan
        @can('viewAny',\App\User::class)
            <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
                <a class="nav-link" href="{!! route('users.index') !!}">
                    <i class="nav-icon fa fa-university"></i>
                    <span>@lang('Users')</span>
                </a>
            </li>
        @endcan
        @can('viewAny',\App\Models\Severity::class)
            <li class="nav-item {{ Request::is('severities*') ? 'active' : '' }}">
                <a class="nav-link" href="{!! route('severities.index') !!}">
                    <i class="nav-icon icon-layers"></i>
                    <span>@lang('Severities')</span>
                </a>
            </li>
        @endcan
        @can('viewAny',\App\Models\Telltype::class)
            <li class="nav-item {{ Request::is('telltypes*') ? 'active' : '' }}">
                <a class="nav-link" href="{!! route('telltypes.index') !!}">
                    <i class="nav-icon fa fa-address-card-o"></i>
                    <span>@lang('Telltypes')</span>
                </a>
            </li>

        @endcan
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
        @can('viewAny',\App\Models\Factory::class)
            <li class="nav-item {{ Request::is('factories*') ? 'active' : '' }}">
                <a class="nav-link" href="{!! route('factories.index') !!}">
                    <i class="nav-icon fa fa-briefcase"></i>
                    <span>@lang('Factories')</span>
                </a>
            </li>
        @endcan

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
        @if (\Illuminate\Support\Facades\Gate::allows('supperadmin-dashboard'))
            <li class="nav-item {{ Request::is('superadmin*') ? 'active' : '' }}">
                <a class="nav-link" href="{!! route('superadmin.index') !!}">
                    <i class="nav-icon fa fa-angle-double-left"></i>
                    <span>@lang('Super Admin Dashboard')</span>
                </a>
            </li>
        @endif
        @if (\Illuminate\Support\Facades\Gate::allows('financial-dashboard'))
                <li class="nav-item {{ Request::is('financial*') ? 'active' : '' }}">
                    <a class="nav-link" href="{!! route('financial.index') !!}">
                        <i class="nav-icon fa fa-angle-double-left"></i>
                        <span>@lang('Financial Dashboard')</span>
                    </a>
                </li>
        @endif
        @if (\Illuminate\Support\Facades\Gate::allows('protection-dashboard'))
                <li class="nav-item {{ Request::is('protection*') ? 'active' : '' }}">
                    <a class="nav-link" href="{!! route('protection.index') !!}">
                        <i class="nav-icon fa fa-angle-double-left"></i>
                        <span>@lang('Protection Dashboard')</span>
                    </a>
                </li>
        @endif
        @if (\Illuminate\Support\Facades\Gate::allows('owner-dashboard'))
            <li class="nav-item {{ Request::is('owner*') ? 'active' : '' }}">
                <a class="nav-link" href="{!! route('owner.index') !!}">
                    <i class="nav-icon fa fa-angle-double-left"></i>
                    <span>@lang('Owner Dashboard')</span>
                </a>
            </li>
        @endif
        @if (\Illuminate\Support\Facades\Gate::allows('support-dashboard'))
            <li class="nav-item {{ Request::is('support*') ? 'active' : '' }}">
                <a class="nav-link" href="{!! route('support.index') !!}">
                    <i class="nav-icon fa fa-angle-double-left"></i>
                    <span>@lang('Support Dashboard')</span>
                </a>
            </li>
        @endif

        @if (\Illuminate\Support\Facades\Gate::allows('successor-dashboard'))
            <li class="nav-item {{ Request::is('successor*') ? 'active' : '' }}">
                <a class="nav-link" href="{!! route('successor.index') !!}">
                    <i class="nav-icon fa fa-angle-double-left"></i>
                    <span>@lang('Successor Dashboard')</span>
                </a>
            </li>
        @endif

        @if (\Illuminate\Support\Facades\Gate::allows('master-dashboard'))
            <li class="nav-item {{ Request::is('master*') ? 'active' : '' }}">
                <a class="nav-link" href="{!! route('master.index') !!}">
                    <i class="nav-icon fa fa-angle-double-left"></i>
                    <span>@lang('Master Dashboard')</span>
                </a>
            </li>
        @endif
        @if (\Illuminate\Support\Facades\Gate::allows('supplier-dashboard'))
            <li class="nav-item {{ Request::is('supplier*') ? 'active' : '' }}">
                <a class="nav-link" href="{!! route('supplier.index') !!}">
                    <i class="nav-icon fa fa-angle-double-left"></i>
                    <span>@lang('Supplier Dashboard')</span>
                </a>
            </li>
        @endif


    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-first-order"></i>
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

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-comment-o"></i>
        @lang('Tickets')
    </a>
    <ul class="nav-dropdown-items">
        <li class="nav-item {{ Request::is('tickets*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('tickets.index') !!}">
                <i class="nav-icon fa fa-comments-o"></i>
                <span>@lang('Tickets')</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('tickets/toanswer*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('tickets.toanswer') !!}">
                <i class="nav-icon fa fa-comments-o"></i>
                <span>@lang('Tickets to answer')</span>
            </a>
        </li>
    </ul>
</li>


{{--Logs--}}
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa  fa-history"></i>
        @lang('Logs')
    </a>
    <ul class="nav-dropdown-items">
        @if (\Illuminate\Support\Facades\Gate::allows('all-auth-logs'))
            <li class="nav-item {{ Request::is('logs*') ? 'active' : '' }}">
                <a class="nav-link" href="{!! route('logs.index') !!}">
                    <i class="nav-icon fa fa-history"></i>
                    <span>@lang('All Authentication Logs')</span>
                </a>
            </li>
        @endif

        <li class="nav-item {{ Request::is('logs/*/user*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('logs.user',[\Illuminate\Support\Facades\Auth::id()]) !!}">
                <i class="nav-icon fa fa-history"></i>
                <span>@lang('User Authentication Logs')</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('logs/sessions*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('logs.sessions') !!}">
                <i class="nav-icon fa fa-history"></i>
                <span>@lang('User Session Logs')</span>
            </a>
        </li>
    </ul>
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
{{--</li>--}}
{{--Logs--}}
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-note"></i>
        @lang('Prefactor and Factors')
    </a>
    <ul class="nav-dropdown-items">
        <li class="nav-item {{ Request::is('prefactors*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('prefactors.index') !!}">
                <i class="nav-icon icon-note"></i>
                <span>@lang('Prefactors')</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('prefactors.factorIndex*') ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('prefactors.factorIndex') !!}">
                <i class="nav-icon icon-notebook"></i>
                <span>@lang('Factors')</span>
            </a>
        </li>
    </ul>
</li>


{{--<li class="nav-item {{ Request::is('prefactorDetails*') ? 'active' : '' }}">--}}
    {{--<a class="nav-link" href="{!! route('prefactorDetails.index') !!}">--}}
        {{--<i class="nav-icon icon-cursor"></i>--}}
        {{--<span>@lang('Prefactor Details')</span>--}}
    {{--</a>--}}
{{--</li>--}}

<li class="nav-item {{ Request::is('settings*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('settings.index') !!}">
        <i class="nav-icon icon-settings"></i>
        <span>@lang('Settings')</span>
    </a>
</li>

{{--<li class="nav-item {{ Request::is('comments*') ? 'active' : '' }}">--}}
    {{--<a class="nav-link" href="{!! route('comments.index') !!}">--}}
        {{--<i class="nav-icon icon-cursor"></i>--}}
        {{--<span>@lang('Comments')</span>--}}
    {{--</a>--}}
{{--</li>--}}
{{--<li class="nav-item {{ Request::is('links*') ? 'active' : '' }}">--}}
    {{--<a class="nav-link" href="{!! route('links.index') !!}">--}}
        {{--<i class="nav-icon icon-link"></i>--}}
        {{--<span>@lang('Links')</span>--}}
    {{--</a>--}}
{{--</li>--}}
