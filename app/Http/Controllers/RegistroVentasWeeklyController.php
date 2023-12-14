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
            'cliente_id' => ['required', 'string'],
            'fardos'  => ['required', 'string'],
            'garrafas' => ['required', 'integer'],
            'pet' => ['required', 'integer'],
            'total' => ['required', 'decimal'],
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
        $cliente_id = $request->get('cliente_id');
        $registros = RegistroVentasWeekly::where('cliente_id', $cliente_id)->get();

        return response()->json($registros);
    }

    public function destroy(string $id)
    {
        $registro = RegistroVentasWeekly::findOrFail($id);
        $registro->delete();
        return response()->json(['message' => 'Registro deleted successfully']);
    }
}
