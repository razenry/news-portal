<?php

namespace App\Policies;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UnitPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any categories.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_unit');
    }

    /**
     * Determine whether the user can view a unit.
     */
    public function view(User $user, Unit $unit): bool
    {
        return $user->can('view_unit');
    }

    /**
     * Determine whether the user can create categories.
     */
    public function create(User $user): bool
    {
        return $user->can('create_unit');
    }

    /**
     * Determine whether the user can update a unit.
     */
    public function update(User $user, Unit $unit): bool
    {
        return $user->can('update_unit');
    }

    /**
     * Determine whether the user can delete a unit.
     */
    public function delete(User $user, Unit $unit): bool
    {
        return $user->can('delete_unit');
    }

    /**
     * Determine whether the user can bulk delete categories.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_unit');
    }

    /**
     * Determine whether the user can permanently delete a unit.
     */
    public function forceDelete(User $user, Unit $unit): bool
    {
        return $user->can('force_delete_unit');
    }

    /**
     * Determine whether the user can permanently bulk delete categories.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_unit');
    }

    /**
     * Determine whether the user can restore a unit.
     */
    public function restore(User $user, Unit $unit): bool
    {
        return $user->can('restore_unit');
    }

    /**
     * Determine whether the user can bulk restore categories.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_unit');
    }

    /**
     * Determine whether the user can replicate a unit.
     */
    public function replicate(User $user, Unit $unit): bool
    {
        return $user->can('replicate_unit');
    }

    /**
     * Determine whether the user can reorder categories.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_unit');
    }
}