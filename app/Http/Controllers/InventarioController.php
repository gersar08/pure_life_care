<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventario;

class InventarioController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Inventario::class);

        $inventario = Inventario::all();

        return response()->json($inventario);
    }
    public function search($field, $query)
    {
        $inventario = Inventario::where($field, $query)->first();

        if ($inventario) {
            return response()->json($inventario);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
    public function store(Request $request)
    {
        $this->authorize('update', Inventario::class);

        $validatedData = $request->validate([
            'product_name' => ['required', 'string'],
            'product_area' => ['required', 'string'],
            'cantidad' => ['required', 'integer'],
            // Agrega aquí más campos según sea necesario
        ]);

        $item = Inventario::create($validatedData);

        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('update', Inventario::class);

        $validatedData = $request->validate([
            'product_name' => ['string', 'max:255'],
            'cantidad' => ['integer'],
            // Agrega aquí más campos según sea necesario
        ]);

        $inventario = Inventario::findOrFail($id);
        $inventario->fill($validatedData);
        $inventario->save();

        return response()->json([
            'inventario' => $inventario,
            'message' => 'Actualizado con éxito'
        ]);
    }

    public function destroy(string $id)
    {
        $inventario = Inventario::findOrFail($id);
        $this->authorize('delete', $inventario);
        $inventario->delete();
        return response()->json(['message' => 'Eliminado con éxito']);
    }
}
