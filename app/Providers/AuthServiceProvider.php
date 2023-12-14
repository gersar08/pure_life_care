<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\PrecioEspecial;
use App\Models\User;
use App\Models\Clientes;
use App\Models\Precios;
use App\Models\Producto;
use App\Models\Inventario;
use App\Policies\PrecioEspecialPolicy;
use App\Policies\UserPolicy;
use App\Policies\InventarioPolicy;
use App\Policies\ClientesPolicy;
use App\Policies\PreciosPolicy;
use App\Policies\ProductoPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        PrecioEspecial::class => PrecioEspecialPolicy::class,
        User::class => UserPolicy::class,
        Clientes::class => ClientesPolicy::class,
        Inventario::class => InventarioPolicy::class,
        Precios::class => PreciosPolicy::class,
        Producto::class => ProductoPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
