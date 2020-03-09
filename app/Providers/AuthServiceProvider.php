<?php

namespace App\Providers;

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
         'App\Models\Role' => 'App\Policies\RolePolicy',
         'App\Models\Ticket' => 'App\Policies\TicketPolicy',
         'App\Models\Card' => 'App\Policies\CardPolicy',
         'App\Models\Category' => 'App\Policies\CategoryPolicy',
         'App\Models\Equipment' => 'App\Policies\EquipmentPolicy',
         'App\Models\Factoryaddress' => 'App\Policies\FactoryaddressPolicy',
         'App\Models\Factory' => 'App\Policies\FactoryPolicy',
         'App\Models\Factorytell' => 'App\Policies\FactorytellPolicy',
         'App\Models\Media' => 'App\Policies\MediaPolicy',
         'App\Models\Message' => 'App\Policies\MessagePolicy',
         'App\Models\Order' => 'App\Policies\OrderPolicy',
         'App\Models\Orderdetail' => 'App\Policies\OrderdetailPolicy',
         'App\Models\OrganizationCategory' => 'App\Policies\OrganizationCategoryPolicy',
         'App\Models\Organization' => 'App\Policies\OrganizationPolicy',
         'App\Models\OrganizationUser' => 'App\Policies\OrganizationUserPolicy',
         'App\Models\ProtectionCategory' => 'App\Policies\ProtectionCategoryPolicy',
         'App\Models\RoleUser' => 'App\Policies\RoleUserPolicy',
         'App\Models\Severity' => 'App\Policies\SeverityPolicy',
         'App\Models\Telltype' => 'App\Policies\TelltypePolicy',
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
