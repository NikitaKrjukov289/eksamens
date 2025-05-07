<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Treners;

class TrenersPolicy
{
    public function view(User $user, Treners $treners)
    {
        return true; 
    }

    public function create(User $user)
    {
        return $user->isAdmin();
    }

    public function update(User $user, Treners $treners)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Treners $treners)
    {
        return $user->isAdmin();
    }
}