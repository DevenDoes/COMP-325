<?php

namespace App\Policies;

use App\User;
use App\Outline;
use App\Paper;
use Illuminate\Auth\Access\HandlesAuthorization;

class OutlinePolicy
{
    use HandlesAuthorization;

    public function index(User $user, Paper $paper) {
        return $paper->user_id == $user->id;
    }

    /**
     * Determine whether the user can view the outline.
     *
     * @param  \App\User  $user
     * @param  \App\Outline  $outline
     * @return mixed
     */
    public function view(User $user, Outline $outline)
    {
        return $outline->user_id == $user->id;
    }

    /**
     * Determine whether the user can create outlines.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Paper $paper)
    {
        return $paper->user_id == $user->id;
    }

    /**
     * Determine whether the user can update the outline.
     *
     * @param  \App\User  $user
     * @param  \App\Outline  $outline
     * @return mixed
     */
    public function update(User $user, Outline $outline)
    {
        return $outline->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the outline.
     *
     * @param  \App\User  $user
     * @param  \App\Outline  $outline
     * @return mixed
     */
    public function delete(User $user, Outline $outline)
    {
        return $outline->user_id == $user->id;
    }

    /**
     * Determine whether the user can restore the outline.
     *
     * @param  \App\User  $user
     * @param  \App\Outline  $outline
     * @return mixed
     */
    public function restore(User $user, Outline $outline)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the outline.
     *
     * @param  \App\User  $user
     * @param  \App\Outline  $outline
     * @return mixed
     */
    public function forceDelete(User $user, Outline $outline)
    {
        //
    }
}
