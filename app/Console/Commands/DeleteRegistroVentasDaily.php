<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\RegistroVentasDaily;

class DeleteRegistroVentasDaily extends Command
{
    protected $signature = 'delete:registroventasdaily';
    protected $description = 'Delete registro ventas daily and make a POST or PUT Request';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Obtén todos los registros
        $registros = RegistroVentasDaily::all();

        foreach ($registros as $registro) {
            // Haz una solicitud GET a la API para verificar si ya existe un registro para este cliente_id
            $response = Http::get('https://rocky-dawn-84773-5951dec09d0b.herokuapp.com/api/registro/weekly/view' .
             $registro->cliente_id);

            if ($response->successful()) {
                // Si la solicitud fue exitosa, significa que ya existe un registro para este cliente_id
                // Suma los nuevos datos a los existentes
                $existingData = $response->json();
                $updatedData = [
                    'fardo' => $existingData['fardo'] + $registro->fardo,
                    'garrafa' => $existingData['garrafa'] + $registro->garrafa,
                    'pet' => $existingData['pet'] + $registro->pet,
                ];

                // Haz una solicitud PUT para actualizar el registro
                Http::put('https://rocky-dawn-84773-5951dec09d0b.herokuapp.com/api/registro/weekly/' .
                 $registro->cliente_id, $updatedData);
            } else {
                // Si la solicitud no fue exitosa, significa que no existe un registro para este cliente_id
                // Haz una solicitud POST para crear un nuevo registro
                Http::post('https://rocky-dawn-84773-5951dec09d0b.herokuapp.com/api/registro/weekly',
                 $registro->toArray());
            }
        }

        // Borra todos los registros
        RegistroVentasDaily::truncate();
    }
}
