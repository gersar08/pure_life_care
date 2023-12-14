<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Crear el rol de administrador
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'api']);

        // Crear el usuario administrador
        $admin = User::create([
            'name' => 'Admin User',
            'user_name' => 'admin',
            'password' => bcrypt('contra152'), // Cambia 'password' por la contraseña que quieras
            'role'=> 'user'
        ]);

        // Asignar el rol de administrador al usuario administrador
        $admin->assignRole($adminRole);

    }
}
