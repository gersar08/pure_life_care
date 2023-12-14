<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Producto;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine si el usuario puede realizar cualquier acción en la tabla producto.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function before(User $user)
    {
        // Verificar si el usuario tiene el rol de administrador
        if ($user->hasRole('admin')) {
            return true;
        }
    }

    /**
     * Determine si el usuario puede ver la lista de productos.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function view(User $user)
    {
        // Aquí puedes definir la lógica para permitir o denegar la visualización de la lista de productos
        return $user->hasAnyRole(['admin', 'product_manager']);
    }

    /**
     * Determine si el usuario puede crear un producto.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        // Aquí puedes definir la lógica para permitir o denegar la creación de un producto
        return $user->hasRole(['admin', 'product_manager']);
    }

    /**
     * Determine si el usuario puede actualizar un producto.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Producto  $producto
     * @return bool
     */
    public function update(User $user)
    {
        // Aquí puedes definir la lógica para permitir o denegar la actualización de un producto
        return $user->hasRole(['admin', 'product_manager']);
    }

    /**
     * Determine si el usuario puede eliminar un producto.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Producto  $producto
     * @return bool
     */
    public function delete(User $user)
    {
        // Aquí puedes definir la lógica para permitir o denegar la eliminación de un producto
        return $user->hasRole(['admin', 'product_manager']);
    }
}
