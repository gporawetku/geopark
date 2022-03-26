<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Slide;
use Illuminate\Auth\Access\HandlesAuthorization;

class SlidePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the slide.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Slide  $slide
     * @return mixed
     */
    public function view(User $user, Slide $slide)
    {
        // Update $user authorization to view $slide here.
        return true;
    }

    /**
     * Determine whether the user can create slide.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Slide  $slide
     * @return mixed
     */
    public function create(User $user, Slide $slide)
    {
        // Update $user authorization to create $slide here.
        return true;
    }

    /**
     * Determine whether the user can update the slide.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Slide  $slide
     * @return mixed
     */
    public function update(User $user, Slide $slide)
    {
        // Update $user authorization to update $slide here.
        return true;
    }

    /**
     * Determine whether the user can delete the slide.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Slide  $slide
     * @return mixed
     */
    public function delete(User $user, Slide $slide)
    {
        // Update $user authorization to delete $slide here.
        return true;
    }
}
