<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistroVentasDaily; // Add this import statement
use App\Models\RegistroVentasWeekly;

class RegistroVentasDailyController extends Controller
{
    public function index()
    {
        $registros = RegistroVentasDaily::all();
        return response()->json($registros);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cliente_id' => 'required',
            'fardo' => 'required',
            'garrafa' => 'required',
            'pet' => 'required'
        ]);

        // Crear el registro
        $registro = RegistroVentasDaily::create($validatedData);

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
        $registro = RegistroVentasDaily::where('cliente_id', $clienteId)->first();

        // Verificar si se encontró un artículo
        if ($registro) {
            return response()->json($registro, 200);
        } else {
            return response()->json(['message' => 'Artículo no encontrado'], 404);
        }
    }

    public function update(Request $request, string $cliente_id)
    {
        $registro = RegistroVentasDaily::where('cliente_id', $cliente_id)->firstOrFail();

        // Actualizar los datos del registro
        $registro->update($request->all());

        return response()->json($registro);
    }


    public function destroy(string $id)
    {
        $registro = RegistroVentasDaily::findOrFail($id);
        $registro->delete();
        return response()->json(['message' => 'Registro deleted successfully']);
    }

    public function eliminarContenido()
    {
        // Obtén todos los registros de la tabla
        $ventas = RegistroVentasDaily::all();

        // Envía los datos a otra tabla
        foreach ($ventas as $venta) {
            // Busca si ya existe un registro con el cliente_id dado
            $ventaSemanal = RegistroVentasWeekly::where('cliente_id', $venta->cliente_id)->first();

            if ($ventaSemanal) {
                // Si existe, actualiza los valores
                $ventaSemanal->fardo += $venta->fardo ?? 0;
                $ventaSemanal->garrafa += $venta->garrafa ?? 0;
                $ventaSemanal->pet += $venta->pet ?? 0;
                $ventaSemanal->save();
            } else {
                // Si no existe, crea un nuevo registro
                RegistroVentasWeekly::create([
                    'cliente_id' => $venta->cliente_id ,
                    'fardo' => $venta->fardo ?? 0,
                    'garrafa' => $venta->garrafa ?? 0,
                    'pet' => $venta->pet ?? 0,
                ]);
            }
        }

        // Luego, elimina el contenido de la tabla original
        RegistroVentasDaily::truncate();

        return response()->json(['message' => 'Contenido eliminado y movido con éxito']);
    }
}
