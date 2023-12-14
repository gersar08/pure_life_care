<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Precios;
use App\Models\User;

class PreciosPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'price_manager']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'price_manager']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'price_manager']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'price_manager']);
    }

}
