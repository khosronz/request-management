<?php

namespace App\Policies;

use App\Models\OrganizationCategory;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class OrganizationCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any organization categories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isSuperadmin()
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can view the organization category.
     *
     * @param  \App\User  $user
     * @param  \App\Models\OrganizationCategory  $organizationCategory
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->isSuperadmin()
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can create organization categories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isSuperadmin()
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can update the organization category.
     *
     * @param  \App\User  $user
     * @param  \App\Models\OrganizationCategory  $organizationCategory
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->isSuperadmin()
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can delete the organization category.
     *
     * @param  \App\User  $user
     * @param  \App\Models\OrganizationCategory  $organizationCategory
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->isSuperadmin()
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can restore the organization category.
     *
     * @param  \App\User  $user
     * @param  \App\Models\OrganizationCategory  $organizationCategory
     * @return mixed
     */
    public function restore(User $user)
    {
        return $user->isSuperadmin()
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can permanently delete the organization category.
     *
     * @param  \App\User  $user
     * @param  \App\Models\OrganizationCategory  $organizationCategory
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        return $user->isSuperadmin()
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }
}
