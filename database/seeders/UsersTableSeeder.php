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
        // Crear un rol de administrador
        $adminRole = Role::create(['name' => 'admin']);

        // Crear un usuario
        $user = User::create([
            'name' => 'Admin User',
            'user_name' => 'admin',
            'password' => 'contra152',
            'role'=> 'admin',
            // Asegúrate de agregar aquí cualquier otro campo requerido por tu base de datos
        ]);

        // Asignar el rol de administrador al usuario
        $user->assignRole($adminRole);
    }
}
