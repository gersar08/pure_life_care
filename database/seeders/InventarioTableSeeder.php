<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('inventario')->insert([
            [
                'product_name' => 'garrafa',
                'product_area'  => 'produccion',
                'cantidad' => 1000
            ], [
                'product_name' => 'fardo',
                'product_area' => 'produccion',
                'cantidad' => 1000
            ], [
                'product_name' => 'pet',
                'product_area' => 'produccion',
                'cantidad' => 1000
            ]
        ]);
    }
}
