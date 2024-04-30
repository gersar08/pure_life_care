<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Inventory;
use App\Models\RegistroVentas;

class AdminController extends Controller
{
    public function users()
    {
        $users = Users::all();
        return view('admin.users', ['users' => $users]);
    }

    public function prices()
    {
        $prices = Inventory::all();
        return view('admin.prices', ['prices' => $prices]);
    }

    public function inventory()
    {
        $inventory = RegistroVentas::all();
        return view('admin.inventory', ['inventory' => $inventory]);
    }
}
