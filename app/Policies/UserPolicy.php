<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User $user
     * @param  \App\User $model
     *
     * @return bool
     */
    public function delete(User $user, User $model): bool
    {
        return ($model->id !== $user->id) && !$model->hasRole('administrator');
    }
}