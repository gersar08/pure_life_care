<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            [
                'unique_id' => 'P102152',
                'nombre' => 'Juan',
                'apellido'  => 'Perez',
                'telefono'  => '12345678',
                'direccion' => 'Calle 1',
                'n_documento'   => '12345678',
            ], [
                'unique_id' => 'P102153',
                'nombre' => 'Pedro',
                'apellido'  => 'Perez',
                'telefono'  => '12345608',
                'direccion' => 'Calle San Juan',
                'n_documento'   => '12345670',
            ], [
                'unique_id' => 'P102154',
                'nombre' => 'Maria',
                'apellido' => 'Perez',
                'telefono' => '02345678',
                'direccion' => 'Calle 2',
                'n_documento' => '12345671',
            ]
        ]);
    }
}
