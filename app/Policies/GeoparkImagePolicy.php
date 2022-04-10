<?php

namespace App\Policies;

use App\Models\User;
use App\Models\GeoparkImage;
use Illuminate\Auth\Access\HandlesAuthorization;

class GeoparkImagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the geopark_image.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\GeoparkImage  $geoparkImage
     * @return mixed
     */
    public function view(User $user, GeoparkImage $geoparkImage)
    {
        // Update $user authorization to view $geoparkImage here.
        return true;
    }

    /**
     * Determine whether the user can create geopark_image.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\GeoparkImage  $geoparkImage
     * @return mixed
     */
    public function create(User $user, GeoparkImage $geoparkImage)
    {
        // Update $user authorization to create $geoparkImage here.
        return true;
    }

    /**
     * Determine whether the user can update the geopark_image.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\GeoparkImage  $geoparkImage
     * @return mixed
     */
    public function update(User $user, GeoparkImage $geoparkImage)
    {
        // Update $user authorization to update $geoparkImage here.
        return true;
    }

    /**
     * Determine whether the user can delete the geopark_image.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\GeoparkImage  $geoparkImage
     * @return mixed
     */
    public function delete(User $user, GeoparkImage $geoparkImage)
    {
        // Update $user authorization to delete $geoparkImage here.
        return true;
    }
}
