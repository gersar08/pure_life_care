<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Clientes;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientesPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        // Permite que solo los usuarios con el rol 'admin' puedan ver cualquier cliente
        return $user->hasRole('admin');
    }

    public function create(User $user)
    {
        // Permite que solo los usuarios con el rol 'admin' puedan crear clientes
        return $user->hasRole('admin');
    }

    public function update(User $user)
    {
        // Permite que solo los usuarios con el rol 'admin' puedan actualizar clientes
        return $user->hasRole('admin');
    }

    public function delete(User $user)
    {
        // Permite que solo los usuarios con el rol 'admin' puedan eliminar clientes
        return $user->hasRole('admin');
    }
}
