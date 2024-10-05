<?php

namespace App\Policies;

use App\Models\Chapter;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChapterPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_chapter');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Chapter $chapter): bool
    {
        return $user->can('view_chapter');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_chapter');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Chapter $chapter): bool
    {
        return $user->can('update_chapter');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Chapter $chapter): bool
    {
        return $user->can('delete_chapter');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Chapter $chapter): bool
    {
        return $user->can('restore_chapter');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Chapter $chapter): bool
    {
        return $user->can('force_delete_chapter');
    }
}
