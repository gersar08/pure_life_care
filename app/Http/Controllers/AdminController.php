<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Clientes;
use App\Models\Inventario;
use App\Models\Precios;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }

    public function clients()
    {
        $clients = Clientes::all();
        return view('admin.clients', ['clients' => $clients]);
    }

    public function prices()
    {
        $prices = Precios::all();
        return view('admin.prices', ['prices' => $prices]);
    }

    public function inventory()
    {
        $inventory = Inventario::all();
        return view('admin.inventory', ['inventory' => $inventory]);
    }
}
