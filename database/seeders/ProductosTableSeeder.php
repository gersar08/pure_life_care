<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productos')->insert([
            [
                'producto_name' => 'garrafa',
                'precio_base' => 2.15
            ], [
                'producto_name' => 'fardo',
                'precio_base' => 1.85
            ], [
                'producto_name' => 'pet',
                'precio_base' => 4.85
            ]
        ]);
    }
}
