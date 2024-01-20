<?php

namespace App\Policies;

use App\Models\Sport;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class SportPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Sport $sport
     * @return bool
     */
    public function delete(User $user, Sport $sport): bool {
        return $user->isAdmin() || $user->id === $sport->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user) {
        return Auth::user()->isAdmin();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Sport $tache
     * @return bool
     */
    public function view(User $user, Sport $tache) {
        return Auth::check();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Sport $sport
     * @return bool
     */
    public function update(User $user, Sport $sport): bool {
        return $user->isAdmin() || $user->id === $sport->user_id;
    }
}
