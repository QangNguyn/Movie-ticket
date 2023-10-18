<?php

namespace App\Policies;

use App\Models\Director;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DirectorPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user)
    {
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        $roleJson = $user->group->permissions;
        return checkPermission($roleJson, 'director', 'add');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user)
    {
        $roleJson = $user->group->permissions;
        return checkPermission($roleJson, 'director', 'edit');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user)
    {
        $roleJson = $user->group->permissions;
        return checkPermission($roleJson, 'director', 'delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user)
    {
        //
    }
}
