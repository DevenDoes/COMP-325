<?php

namespace App\Policies;

use App\User;
use App\Paper;
use App\Analysis;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnalysisPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the analysis.
     *
     * @param  \App\User  $user
     * @param  \App\Analysis  $analysis
     * @return mixed
     */
    public function view(User $user, Analysis $analysis)
    {
        return $analysis->user_id == $user->id;
    }

    /**
     * Determine whether the user can create analyses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Paper $paper)
    {
        return $paper->user_id == $user->id;
    }

    /**
     * Determine whether the user can update the analysis.
     *
     * @param  \App\User  $user
     * @param  \App\Analysis  $analysis
     * @return mixed
     */
    public function update(User $user, Analysis $analysis)
    {
        return $analysis->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the analysis.
     *
     * @param  \App\User  $user
     * @param  \App\Analysis  $analysis
     * @return mixed
     */
    public function delete(User $user, Analysis $analysis)
    {
        return $analysis->user_id == $user->id;
    }

    /**
     * Determine whether the user can restore the analysis.
     *
     * @param  \App\User  $user
     * @param  \App\Analysis  $analysis
     * @return mixed
     */
    public function restore(User $user, Analysis $analysis)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the analysis.
     *
     * @param  \App\User  $user
     * @param  \App\Analysis  $analysis
     * @return mixed
     */
    public function forceDelete(User $user, Analysis $analysis)
    {
        //
    }
}
