<?php

namespace App\Policies;

use App\Models\Setting;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any settings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isSuperadmin();
    }

    /**
     * Determine whether the user can view the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Setting  $setting
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->isSuperadmin();
    }

    /**
     * Determine whether the user can create settings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isSuperadmin();
    }

    /**
     * Determine whether the user can update the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Setting  $setting
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->isSuperadmin();
    }

    /**
     * Determine whether the user can delete the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Setting  $setting
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->isSuperadmin();
    }

    /**
     * Determine whether the user can restore the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Setting  $setting
     * @return mixed
     */
    public function restore(User $user)
    {
        return $user->isSuperadmin();
    }

    /**
     * Determine whether the user can permanently delete the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Setting  $setting
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        return $user->isSuperadmin();
    }
}
