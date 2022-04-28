<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Gallery;
use Illuminate\Auth\Access\HandlesAuthorization;

class GalleryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the gallery.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Gallery  $gallery
     * @return mixed
     */
    public function view(User $user, Gallery $gallery)
    {
        // Update $user authorization to view $gallery here.
        return true;
    }

    /**
     * Determine whether the user can create gallery.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Gallery  $gallery
     * @return mixed
     */
    public function create(User $user, Gallery $gallery)
    {
        // Update $user authorization to create $gallery here.
        return true;
    }

    /**
     * Determine whether the user can update the gallery.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Gallery  $gallery
     * @return mixed
     */
    public function update(User $user, Gallery $gallery)
    {
        // Update $user authorization to update $gallery here.
        return true;
    }

    /**
     * Determine whether the user can delete the gallery.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Gallery  $gallery
     * @return mixed
     */
    public function delete(User $user, Gallery $gallery)
    {
        // Update $user authorization to delete $gallery here.
        return true;
    }
}
