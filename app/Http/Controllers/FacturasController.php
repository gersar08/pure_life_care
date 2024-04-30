<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function index()
    {
        return Factura::all();
    }

    public function store(Request $request)
    {
        return Factura::create($request->all());
    }

    public function update(Request $request, Factura $factura)
    {
        $factura->update($request->all());
        return $factura;
    }

    public function destroy(Factura $factura)
    {
        $factura->delete();
        return response()->json(null, 204);
    }
}
