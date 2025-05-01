<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;


class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the user can view the admin options.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAdminOptions(User $user)
    {
        return $user->login === 'admin';
    }
}
