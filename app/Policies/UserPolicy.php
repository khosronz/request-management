<?php

namespace App\Policies;

use App\Models\Role;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
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
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->isSuperadmin()
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can create models.
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
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $user, User $user2)
    {
        if ($user->isSuperadmin() || $user->id == $user2->id){
            return Response::allow();
        }
        else {
            return Response::deny(__('You do not permission to this section.'));
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->isSuperadmin()
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function restore(User $user)
    {
        return $user->isSuperadmin()
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        return $user->isSuperadmin()
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }
}
