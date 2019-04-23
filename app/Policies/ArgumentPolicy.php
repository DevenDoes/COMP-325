<?php

namespace App\Policies;

use App\User;
use App\Argument;
use App\Paper;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArgumentPolicy
{
    use HandlesAuthorization;

    public function index(User $user, Paper $paper) {
        return $paper->user_id == $user->id;
    }

    /**
     * Determine whether the user can view the argument.
     *
     * @param  \App\User  $user
     * @param  \App\Argument  $argument
     * @return mixed
     */
    public function view(User $user, Argument $argument)
    {
        return $argument->user_id == $user->id;
    }

    /**
     * Determine whether the user can create arguments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Paper $paper)
    {
        return $paper->user_id == $user->id;
    }

    /**
     * Determine whether the user can update the argument.
     *
     * @param  \App\User  $user
     * @param  \App\Argument  $argument
     * @return mixed
     */
    public function update(User $user, Argument $argument)
    {
        return $argument->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the argument.
     *
     * @param  \App\User  $user
     * @param  \App\Argument  $argument
     * @return mixed
     */
    public function delete(User $user, Argument $argument)
    {
        return $argument->user_id == $user->id;
    }

    /**
     * Determine whether the user can restore the argument.
     *
     * @param  \App\User  $user
     * @param  \App\Argument  $argument
     * @return mixed
     */
    public function restore(User $user, Argument $argument)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the argument.
     *
     * @param  \App\User  $user
     * @param  \App\Argument  $argument
     * @return mixed
     */
    public function forceDelete(User $user, Argument $argument)
    {
        //
    }
}
