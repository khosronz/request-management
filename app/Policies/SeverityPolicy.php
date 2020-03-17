<?php

namespace App\Policies;

use App\Severity;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SeverityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any severities.
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
     * Determine whether the user can view the severity.
     *
     * @param  \App\User  $user
     * @param  \App\Severity  $severity
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->isSuperadmin()
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can create severities.
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
     * Determine whether the user can update the severity.
     *
     * @param  \App\User  $user
     * @param  \App\Severity  $severity
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->isSuperadmin()
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can delete the severity.
     *
     * @param  \App\User  $user
     * @param  \App\Severity  $severity
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->isSuperadmin()
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can restore the severity.
     *
     * @param  \App\User  $user
     * @param  \App\Severity  $severity
     * @return mixed
     */
    public function restore(User $user)
    {
        return $user->isSuperadmin()
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }

    /**
     * Determine whether the user can permanently delete the severity.
     *
     * @param  \App\User  $user
     * @param  \App\Severity  $severity
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        return $user->isSuperadmin()
            ? Response::allow()
            : Response::deny(__('You do not permission to this section.'));
    }
}
