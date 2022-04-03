<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Banner;
use Illuminate\Auth\Access\HandlesAuthorization;

class BannerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the banner.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Banner  $banner
     * @return mixed
     */
    public function view(User $user, Banner $banner)
    {
        // Update $user authorization to view $banner here.
        return true;
    }

    /**
     * Determine whether the user can create banner.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Banner  $banner
     * @return mixed
     */
    public function create(User $user, Banner $banner)
    {
        // Update $user authorization to create $banner here.
        return true;
    }

    /**
     * Determine whether the user can update the banner.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Banner  $banner
     * @return mixed
     */
    public function update(User $user, Banner $banner)
    {
        // Update $user authorization to update $banner here.
        return true;
    }

    /**
     * Determine whether the user can delete the banner.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Banner  $banner
     * @return mixed
     */
    public function delete(User $user, Banner $banner)
    {
        // Update $user authorization to delete $banner here.
        return true;
    }
}
