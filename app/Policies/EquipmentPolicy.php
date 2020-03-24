<?php

namespace App\Policies;

use App\Models\Equipment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class EquipmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any equipment.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return ($user->isSuperadmin() || $user->isMaster())
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can view the equipment.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Equipment  $equipment
     * @return mixed
     */
    public function view(User $user)
    {
        return ($user->isSuperadmin() || $user->isMaster())
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can create equipment.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->isSuperadmin() || $user->isMaster())
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can update the equipment.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Equipment  $equipment
     * @return mixed
     */
    public function update(User $user)
    {
        return ($user->isSuperadmin() || $user->isMaster())
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can delete the equipment.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Equipment  $equipment
     * @return mixed
     */
    public function delete(User $user)
    {
        return ($user->isSuperadmin() || $user->isMaster())
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can restore the equipment.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Equipment  $equipment
     * @return mixed
     */
    public function restore(User $user)
    {
        return ($user->isSuperadmin() || $user->isMaster())
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can permanently delete the equipment.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Equipment  $equipment
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        return ($user->isSuperadmin() || $user->isMaster())
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }
}
