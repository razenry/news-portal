<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any categories.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_category');
    }

    /**
     * Determine whether the user can view a category.
     */
    public function view(User $user, Category $category): bool
    {
        return $user->can('view_category');
    }

    /**
     * Determine whether the user can create categories.
     */
    public function create(User $user): bool
    {
        return $user->can('create_category');
    }

    /**
     * Determine whether the user can update a category.
     */
    public function update(User $user, Category $category): bool
    {
        return $user->can('update_category');
    }

    /**
     * Determine whether the user can delete a category.
     */
    public function delete(User $user, Category $category): bool
    {
        return $user->can('delete_category');
    }

    /**
     * Determine whether the user can bulk delete categories.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_category');
    }

    /**
     * Determine whether the user can permanently delete a category.
     */
    public function forceDelete(User $user, Category $category): bool
    {
        return $user->can('force_delete_category');
    }

    /**
     * Determine whether the user can permanently bulk delete categories.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_category');
    }

    /**
     * Determine whether the user can restore a category.
     */
    public function restore(User $user, Category $category): bool
    {
        return $user->can('restore_category');
    }

    /**
     * Determine whether the user can bulk restore categories.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_category');
    }

    /**
     * Determine whether the user can replicate a category.
     */
    public function replicate(User $user, Category $category): bool
    {
        return $user->can('replicate_category');
    }

    /**
     * Determine whether the user can reorder categories.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_category');
    }
}