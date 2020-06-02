<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function user_edit(User $loggedUser, User $user) // logged user can change its info, admin as well
    {
        return $loggedUser->is($user) OR auth()->user()->hasRole('admin');
    }

    public function user_delete(User $loggedUser, User $user) // logged user can delete own profile, admin as well
    {
        return $loggedUser->is($user) OR auth()->user()->hasRole('admin');
    }
}
