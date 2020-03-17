<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Factory;
use App\Models\Organization;
use App\Models\OrganizationCategory;
use App\Models\Role;
use App\Models\Severity;
use App\Models\Telltype;
use App\Policies\CategoryPolicy;
use App\Policies\FactoryPolicy;
use App\Policies\OrganizationCategoryPolicy;
use App\Policies\OrganizationPolicy;
use App\Policies\RolePolicy;
use App\Policies\SeverityPolicy;
use App\Policies\TelltypePolicy;
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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
