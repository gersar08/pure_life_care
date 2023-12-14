<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PrecioEspecial;
use Illuminate\Auth\Access\HandlesAuthorization;

class PrecioEspecialPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->hasRole('admin');
    }

    public function update(User $user)
    {
        return $user->hasRole('admin');
    }

    public function delete(User $user)
    {
        return $user->hasRole('admin');
    }
}
