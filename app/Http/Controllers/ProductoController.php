<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductoController extends Controller
{     public function index()
    {
            if (Gate::denies('viewAny', PrecioEspecial::class)) {
                abort(403);
            }
        $preciosEspeciales = Producto::all();
        return response()->json($preciosEspeciales);
    }
    public function search($field, $query)
    {
        $producto = Producto::where($field, $query)->first();

        if ($producto) {
            return response()->json($producto);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
    public function store(Request $request)
    {
        $this->authorize('create', Inventario::class);

        $validatedData = $request->validate([
            'product_name' => ['required', 'string', 'max:255'],
            'precio_base' => ['required', 'numeric'],
        ]);

        $item = Producto::create($validatedData);

        return response()->json($item, 201);
    }

    public function update(Request $request, string $id)
    {
        $producto = Producto::findOrFail($id);
        $this->authorize('update', $producto);

        $validatedData = $request->validate([
            'producto_name' => ['required', 'string', 'max:255'],
            'precio_base' => ['required', 'numeric'],
        ]);

        $producto->update($validatedData);

        return response()->json($producto);
    }

    public function destroy(string $id)
    {
        $producto = Producto::findOrFail($id);
        $this->authorize('delete', $producto);
        $producto->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
