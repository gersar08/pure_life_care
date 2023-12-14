<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;

class FacturaController extends Controller
{
    public function index()
    {
        $facturas = Factura::all();
        return view('facturas.index', compact('facturas'));
    }

    public function create()
    {
        return view('facturas.create');
    }

    public function store(Request $request)
    {
        Factura::create($request->all()); // Update this line
        return redirect()->route('facturas.index');
    }

    public function show(Factura $factura)
    {
        return view('facturas.show', compact('factura'));
    }

    public function edit(Factura $factura)
    {
        return view('facturas.edit', compact('factura'));
    }

    public function update(Request $request, Factura $factura)
    {
        $factura->update($request->all());
        return redirect()->route('facturas.index');
    }

    public function destroy(Factura $factura)
    {
        $factura->delete();
        return redirect()->route('facturas.index');
    }
}
