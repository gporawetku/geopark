<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Blog;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the blog.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog  $blog
     * @return mixed
     */
    public function view(User $user, Blog $blog)
    {
        // Update $user authorization to view $blog here.
        return true;
    }

    /**
     * Determine whether the user can create blog.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog  $blog
     * @return mixed
     */
    public function create(User $user, Blog $blog)
    {
        // Update $user authorization to create $blog here.
        return true;
    }

    /**
     * Determine whether the user can update the blog.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog  $blog
     * @return mixed
     */
    public function update(User $user, Blog $blog)
    {
        // Update $user authorization to update $blog here.
        return true;
    }

    /**
     * Determine whether the user can delete the blog.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog  $blog
     * @return mixed
     */
    public function delete(User $user, Blog $blog)
    {
        // Update $user authorization to delete $blog here.
        return true;
    }
}
