<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Information;
use Illuminate\Auth\Access\HandlesAuthorization;

class InformationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the information.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Information  $information
     * @return mixed
     */
    public function view(User $user, Information $information)
    {
        // Update $user authorization to view $information here.
        return true;
    }

    /**
     * Determine whether the user can create information.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Information  $information
     * @return mixed
     */
    public function create(User $user, Information $information)
    {
        // Update $user authorization to create $information here.
        return true;
    }

    /**
     * Determine whether the user can update the information.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Information  $information
     * @return mixed
     */
    public function update(User $user, Information $information)
    {
        // Update $user authorization to update $information here.
        return true;
    }

    /**
     * Determine whether the user can delete the information.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Information  $information
     * @return mixed
     */
    public function delete(User $user, Information $information)
    {
        // Update $user authorization to delete $information here.
        return true;
    }
}
