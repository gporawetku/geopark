<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Geopark;
use Illuminate\Auth\Access\HandlesAuthorization;

class GeoparkPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the geopark.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Geopark  $geopark
     * @return mixed
     */
    public function view(User $user, Geopark $geopark)
    {
        // Update $user authorization to view $geopark here.
        return true;
    }

    /**
     * Determine whether the user can create geopark.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Geopark  $geopark
     * @return mixed
     */
    public function create(User $user, Geopark $geopark)
    {
        // Update $user authorization to create $geopark here.
        return true;
    }

    /**
     * Determine whether the user can update the geopark.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Geopark  $geopark
     * @return mixed
     */
    public function update(User $user, Geopark $geopark)
    {
        // Update $user authorization to update $geopark here.
        return true;
    }

    /**
     * Determine whether the user can delete the geopark.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Geopark  $geopark
     * @return mixed
     */
    public function delete(User $user, Geopark $geopark)
    {
        // Update $user authorization to delete $geopark here.
        return true;
    }
}
