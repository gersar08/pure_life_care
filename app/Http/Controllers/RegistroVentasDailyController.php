<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistroVentasDaily;

class RegistroVentasDailyController extends Controller
{
    public function index()
    {
        $registros = RegistroVentasDaily::all();
        return response()->json($registros);
    }

    public function store(Request $request)
    {
        // Aquí debes validar los datos de la solicitud según las reglas de tu modelo
        $validatedData = $request->validate([
            'cliente_id' => ['string',  'exists:clientes,unique_id'],
            'fardo'  => ['string'],
            'garrafa' => ['integer'],
            'pet' => ['integer'],
            'total' => ['decimal'],
        ]);

        // Crear el registro
        $registro = RegistroVentasDaily::create($validatedData);

        return response()->json($registro);
    }
    public function search(Request $request)
    {
        $cliente_id = $request->get('cliente_id');
        $registros = RegistroVentasDaily::where('cliente_id', $cliente_id)->get();

        return response()->json($registros);
    }

    public function update(Request $request, string $id)
    {
        $registro = RegistroVentasDaily::findOrFail($id);

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
