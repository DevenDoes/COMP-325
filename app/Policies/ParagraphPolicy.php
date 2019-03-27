<?php

namespace App\Policies;

use App\User;
use App\Paragraph;
use App\Paper;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParagraphPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the paragraph.
     *
     * @param  \App\User  $user
     * @param  \App\Paragraph  $paragraph
     * @return mixed
     */
    public function view(User $user, Paragraph $paragraph)
    {
        return $paragraph->user_id == $user->id;
    }

    /**
     * Determine whether the user can create paragraphs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Paper $paper)
    {
        return $paper->user_id == $user->id;
    }

    /**
     * Determine whether the user can update the paragraph.
     *
     * @param  \App\User  $user
     * @param  \App\Paragraph  $paragraph
     * @return mixed
     */
    public function update(User $user, Paragraph $paragraph)
    {
        return $paragraph->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the paragraph.
     *
     * @param  \App\User  $user
     * @param  \App\Paragraph  $paragraph
     * @return mixed
     */
    public function delete(User $user, Paragraph $paragraph)
    {
        return $paragraph->user_id == $user->id;
    }

    /**
     * Determine whether the user can restore the paragraph.
     *
     * @param  \App\User  $user
     * @param  \App\Paragraph  $paragraph
     * @return mixed
     */
    public function restore(User $user, Paragraph $paragraph)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the paragraph.
     *
     * @param  \App\User  $user
     * @param  \App\Paragraph  $paragraph
     * @return mixed
     */
    public function forceDelete(User $user, Paragraph $paragraph)
    {
        //
    }
}
