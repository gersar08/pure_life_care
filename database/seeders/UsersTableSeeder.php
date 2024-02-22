<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear un rol de administrador $adminRole = Role::create(['name' => 'admin']);

        // Crear un usuario
        // Crear el usuario administrador
        $admin = User::create([
            'name' => 'Admin User',
            'user_name' => 'admin',
            'password' => bcrypt('contra152'), // Cambia 'password' por la contraseña que quieras
            'role'=> 'admin'
        ]);

        // Asignar el rol de administrador al usuario administrador
        $admin->assignRole('admin');
    }
}
