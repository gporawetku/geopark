<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Schedule;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchedulePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the schedule.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Schedule  $schedule
     * @return mixed
     */
    public function view(User $user, Schedule $schedule)
    {
        // Update $user authorization to view $schedule here.
        return true;
    }

    /**
     * Determine whether the user can create schedule.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Schedule  $schedule
     * @return mixed
     */
    public function create(User $user, Schedule $schedule)
    {
        // Update $user authorization to create $schedule here.
        return true;
    }

    /**
     * Determine whether the user can update the schedule.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Schedule  $schedule
     * @return mixed
     */
    public function update(User $user, Schedule $schedule)
    {
        // Update $user authorization to update $schedule here.
        return true;
    }

    /**
     * Determine whether the user can delete the schedule.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Schedule  $schedule
     * @return mixed
     */
    public function delete(User $user, Schedule $schedule)
    {
        // Update $user authorization to delete $schedule here.
        return true;
    }
}
