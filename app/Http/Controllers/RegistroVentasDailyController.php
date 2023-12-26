<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistroVentasDaily; // Add this import statement
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $cliente_id = $request->get('cliente_id');

        // Log the cliente_id
        Log::info('cliente_id: ' . $cliente_id);

        $registros = RegistroVentasDaily::where('cliente_id', $cliente_id)->get();

        // Log the result
        Log::info('registros: ', $registros->toArray());

        return response()->json($registros);
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
}
