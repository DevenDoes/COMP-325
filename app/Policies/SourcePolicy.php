<?php

namespace App\Policies;

use App\User;
use App\Paper;
use App\Source;
use Illuminate\Auth\Access\HandlesAuthorization;

class SourcePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the source.
     *
     * @param  \App\User  $user
     * @param  \App\Source  $source
     * @return mixed
     */
    public function view(User $user, Source $source)
    {
        return $source->user_id == $user->id;
    }

    /**
     * Determine whether the user can create sources.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Paper $paper)
    {
        return $paper->user_id == $user->id;
    }

    /**
     * Determine whether the user can update the source.
     *
     * @param  \App\User  $user
     * @param  \App\Source  $source
     * @return mixed
     */
    public function update(User $user, Source $source)
    {
        return $source->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the source.
     *
     * @param  \App\User  $user
     * @param  \App\Source  $source
     * @return mixed
     */
    public function delete(User $user, Source $source)
    {
        return $source->user_id == $user->id;
    }

    /**
     * Determine whether the user can restore the source.
     *
     * @param  \App\User  $user
     * @param  \App\Source  $source
     * @return mixed
     */
    public function restore(User $user, Source $source)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the source.
     *
     * @param  \App\User  $user
     * @param  \App\Source  $source
     * @return mixed
     */
    public function forceDelete(User $user, Source $source)
    {
        //
    }
}
