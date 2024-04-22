<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\Admin;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, Article $article): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, Article $article): bool
    {
        // dd($user->id, $article->user_id);
        $hasPermission = $user->permissions->pluck('title')->toArray();
        return $user->id == $article->user_id || in_array('admin', $hasPermission);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, Article $article): bool
    {
        $hasPermission = $user->permissions->pluck('title')->toArray();
        return in_array('admin', $hasPermission);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, Article $article): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, Article $article): bool
    {
        $hasPermission = $user->permissions->pluck('title')->toArray();
        return in_array('admin', $hasPermission);
    }
}
