<?php

namespace App\Policies;

use App\User;
use App\Article;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Skip policy checking if user has administrator role.
     *
     * @param User $user
     *
     * @return bool
     */
    public function before(User $user): bool
    {
        if ($user->hasRole('administrator')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the article.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     *
     * @return bool
     */
    public function update(User $user, Article $article): bool
    {
        return $article->user->id === $user->id;
    }

    /**
     * Determine whether the user can delete the article.
     *
     * @param  \App\User $user
     * @param  \App\Article $article
     *
     * @return bool
     */
    public function delete(User $user, Article $article): bool
    {
        return $article->user->id === $user->id;
    }
}