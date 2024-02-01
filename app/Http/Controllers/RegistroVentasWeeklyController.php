<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistroVentasWeekly;

class RegistroVentasWeeklyController extends Controller
{
    public function index()
    {
        $registros = RegistroVentasWeekly::all();
        return response()->json($registros);
    }

    public function store(Request $request)
    {
        // Aquí debes validar los datos de la solicitud según las reglas de tu modelo
        $validatedData = $request->validate([
            'cliente_id' => 'required',
            'fardo' => 'required',
            'garrafa' => 'required',
            'pet' => 'required'
            // ...
        ]);

        // Crear el registro
        $registro = RegistroVentasWeekly::create($validatedData);

        return response()->json($registro);
    }

    public function update(Request $request, string $id)
    {
        $registro = RegistroVentasWeekly::findOrFail($id);

        // Actualizar los datos del registro
        $registro->update($request->all());

        return response()->json($registro);
    }

    public function search(Request $request)
    {
        $clienteId = $request->cliente_id;
        // Validar que el cliente_id sea proporcionado
        if (!$clienteId) {
            return response()->json(['error' => 'Debes proporcionar un cliente_id'], 400);
        }
        // Buscar el artículo por cliente_id
        $registro = RegistroVentasWeekly::where('cliente_id', $clienteId)->first();

        // Verificar si se encontró un artículo
        if ($registro) {
            return response()->json( $registro, 200);
        } else {
            return response()->json(['message' => 'Artículo no encontrado'], 404);
        }
    }


    public function destroy(string $id)
    {
        $registro = RegistroVentasWeekly::findOrFail($id);
        $registro->delete();
        return response()->json(['message' => 'Registro deleted successfully']);
    }
}
