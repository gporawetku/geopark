<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AbstractPoster;
use Illuminate\Auth\Access\HandlesAuthorization;

class AbstractPosterPolicy
{
    use HandlesAuthorization;

    public function view(User $user, AbstractPoster $abstractPoster)
    {
        // Update $user authorization to view $abstractPoster here.
        return true;
    }

    public function create(User $user, AbstractPoster $abstractPoster)
    {
        // Update $user authorization to create $abstractPoster here.
        return true;
    }

    public function update(User $user, AbstractPoster $abstractPoster)
    {
        // Update $user authorization to update $abstractPoster here.
        return true;
    }

    public function delete(User $user, AbstractPoster $abstractPoster)
    {
        // Update $user authorization to delete $abstractPoster here.
        return true;
    }
}
