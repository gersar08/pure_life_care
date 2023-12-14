<?php
namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InventarioPolicy
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

