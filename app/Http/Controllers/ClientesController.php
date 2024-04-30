<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Clientes::class);
        $clientes = Clientes::all();
        return response()->json($clientes);
    }
    public function search($field, $query)
    {
        $clientes = Clientes::where($field, $query)->first();

        if ($clientes) {
            return response()->json($clientes);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $this->authorize('create', Clientes::class);
        $cliente = Clientes::create($request->all());
        return response()->json($cliente, 201);
    }

    public function update(Request $request, string $id)
    {
        $cliente = Clientes::findOrFail($id);
        $this->authorize('update', $cliente);
        $cliente->update($request->all());
        return response()->json($cliente);
    }

    public function destroy(string $id)
    {
        $cliente = Clientes::findOrFail($id);
        $this->authorize('delete', $cliente);
        $cliente->delete();
        return response()->json(['message' => 'Cliente deleted successfully']);
    }
}
