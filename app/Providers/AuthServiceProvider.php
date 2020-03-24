<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Equipment;
use App\Models\Factory;
use App\Models\Media;
use App\Models\Message;
use App\Models\Organization;
use App\Models\OrganizationCategory;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Severity;
use App\Models\Telltype;
use App\Models\Ticket;
use App\Policies\CategoryPolicy;
use App\Policies\EquipmentPolicy;
use App\Policies\FactoryPolicy;
use App\Policies\MediaPolicy;
use App\Policies\MessagePolicy;
use App\Policies\OrganizationCategoryPolicy;
use App\Policies\OrganizationPolicy;
use App\Policies\RolePolicy;
use App\Policies\SettingPolicy;
use App\Policies\SeverityPolicy;
use App\Policies\TelltypePolicy;
use App\Policies\TicketPolicy;
use App\Policies\UserPolicy;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Organization::class => OrganizationPolicy::class,
        Category::class => CategoryPolicy::class,
        Role::class => RolePolicy::class,
        User::class => UserPolicy::class,
        OrganizationCategory::class => OrganizationCategoryPolicy::class,
        Severity::class => SeverityPolicy::class,
        Factory::class => FactoryPolicy::class,
        Telltype::class => TelltypePolicy::class,
        Ticket::class => TicketPolicy::class,
//        Message::class => MessagePolicy::class,
        Equipment::class => EquipmentPolicy::class,
        Media::class => MediaPolicy::class,
        Setting::class => SettingPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('supperadmin-dashboard', function ($user) {
            return $user->isSuperadmin();
        });
        Gate::define('financial-dashboard', function ($user) {
            return $user->isFinancial();
        });
        Gate::define('master-dashboard', function ($user) {
            return $user->isMaster();
        });
        Gate::define('owner-dashboard', function ($user) {
            return $user->isOwner();
        });
        Gate::define('protection-dashboard', function ($user) {
            return $user->isProtection();
        });
        Gate::define('successor-dashboard', function ($user) {
            return $user->isSuccessor();
        });
        Gate::define('support-dashboard', function ($user) {
            return $user->isSupport();
        });
        Gate::define('supplier-dashboard', function ($user) {
            return $user->isSupplier();
        });
        Gate::define('all-auth-logs', function ($user) {
            return $user->isSuperadmin();
        });
    }
}
