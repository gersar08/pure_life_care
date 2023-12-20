<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Clientes;
use App\Models\Producto;
use App\Models\Inventario;
use App\Policies\UserPolicy;
use App\Policies\InventarioPolicy;
use App\Policies\ClientesPolicy;
use App\Policies\ProductoPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        User::class => UserPolicy::class,
        Clientes::class => ClientesPolicy::class,
        Inventario::class => InventarioPolicy::class,
        Producto::class => ProductoPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
