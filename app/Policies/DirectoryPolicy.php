<?php

namespace App\Policies;

use App\Models\Directory;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class DirectoryPolicy
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
    public function view(User $user, Directory $directory): bool
    {
        if ($user->hasRole(['develop', 'admin']))
            return true;

        return $directory->users()->where('user_id', $user->id)->exists();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->hasRole(['develop', 'admin']))
            return true;

        $user_license = $user->user_license;

        if (!$user_license)
            return false;

        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Directory $directory): bool
    {
        if ($user->hasRole(['develop', 'admin']))
            return true;

        $user_license = $user->user_license;

        if (!$user_license)
            return false;

        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Directory $directory): bool
    {
        if ($user->hasRole(['develop', 'admin']))
            return true;

        $user_license = $user->user_license;

        if (!$user_license)
            return false;

        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Directory $directory): bool
    {
        return $user->hasRole(['client']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Directory $directory): bool
    {
        return $user->hasRole(['develop', 'admin']);
    }
}
