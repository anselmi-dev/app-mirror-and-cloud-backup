<?php

namespace App\Policies;

use App\Models\License;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class LicensePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['develop', 'admin']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, License $license): bool
    {
        if ($user->hasRole(['develop', 'admin']))
            return true;

        return $license->users()->where('user_id', $user->id)->exists();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole(['develop', 'admin']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, License $license): bool
    {
        return $user->hasRole(['develop', 'admin']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, License $license): bool
    {
        return $user->hasRole(['develop', 'admin']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, License $license): bool
    {
        return $user->hasRole(['client']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, License $license): bool
    {
        return $user->hasRole(['develop', 'admin']);
    }
}
