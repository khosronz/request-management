<?php

namespace App\Policies;

use App\Telltype;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TelltypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any telltypes.
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
     * Determine whether the user can view the telltype.
     *
     * @param  \App\User  $user
     * @param  \App\Telltype  $telltype
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->isSuperadmin()
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can create telltypes.
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
     * Determine whether the user can update the telltype.
     *
     * @param  \App\User  $user
     * @param  \App\Telltype  $telltype
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->isSuperadmin()
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can delete the telltype.
     *
     * @param  \App\User  $user
     * @param  \App\Telltype  $telltype
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->isSuperadmin()
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can restore the telltype.
     *
     * @param  \App\User  $user
     * @param  \App\Telltype  $telltype
     * @return mixed
     */
    public function restore(User $user)
    {
        return $user->isSuperadmin()
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can permanently delete the telltype.
     *
     * @param  \App\User  $user
     * @param  \App\Telltype  $telltype
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        return $user->isSuperadmin()
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }
}
