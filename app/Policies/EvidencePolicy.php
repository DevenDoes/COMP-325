<?php

namespace App\Policies;

use App\User;
use App\Evidence;
use App\Source;
use App\Paper;
use Illuminate\Auth\Access\HandlesAuthorization;

class EvidencePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the evidence.
     *
     * @param  \App\User  $user
     * @param  \App\Evidence  $evidence
     * @return mixed
     */
    public function view(User $user, Evidence $evidence)
    {
        //
    }

    /**
     * Determine whether the user can create evidence.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Paper $paper, Source $source)
    {
        return $paper->user_id == $user->id && $source->user_id == $user->id;
    }

    /**
     * Determine whether the user can update the evidence.
     *
     * @param  \App\User  $user
     * @param  \App\Evidence  $evidence
     * @return mixed
     */
    public function update(User $user, Evidence $evidence)
    {
        return $evidence->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the evidence.
     *
     * @param  \App\User  $user
     * @param  \App\Evidence  $evidence
     * @return mixed
     */
    public function delete(User $user, Evidence $evidence)
    {
        //
    }

    /**
     * Determine whether the user can restore the evidence.
     *
     * @param  \App\User  $user
     * @param  \App\Evidence  $evidence
     * @return mixed
     */
    public function restore(User $user, Evidence $evidence)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the evidence.
     *
     * @param  \App\User  $user
     * @param  \App\Evidence  $evidence
     * @return mixed
     */
    public function forceDelete(User $user, Evidence $evidence)
    {
        //
    }
}
