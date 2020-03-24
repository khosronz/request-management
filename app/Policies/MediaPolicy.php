<?php

namespace App\Policies;

use App\Models\Media;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MediaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any media.
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
     * Determine whether the user can view the media.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Media  $media
     * @return mixed
     */
    public function view(User $user, Media $media)
    {
        return $user->id === $media->user_id;
    }

    /**
     * Determine whether the user can create media.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the media.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Media  $media
     * @return mixed
     */
    public function update(User $user, Media $media)
    {
        return $user->id === $media->user_id;
    }

    /**
     * Determine whether the user can delete the media.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Media  $media
     * @return mixed
     */
    public function delete(User $user, Media $media)
    {
        return $user->id === $media->user_id;
    }

    /**
     * Determine whether the user can restore the media.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Media  $media
     * @return mixed
     */
    public function restore(User $user, Media $media)
    {
        return $user->id === $media->user_id;
    }

    /**
     * Determine whether the user can permanently delete the media.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Media  $media
     * @return mixed
     */
    public function forceDelete(User $user, Media $media)
    {
        return $user->id === $media->user_id;
    }
}
