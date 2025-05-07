<?php

namespace App\Policies;
use App\Models\User;
use App\Models\Trenins;

class TreninsPolicy
{
    public function view(User $user, Trenins $trenins)
    {
        return true; 
    }

    public function update(User $user, Trenins $trenins)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Trenins $trenins)
    {
        return $user->isAdmin();
    }

    public function create(User $user)
    {
        return $user->isAdmin();
    }
}

