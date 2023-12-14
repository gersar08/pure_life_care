<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RegistroVentasDaily;
use App\Models\RegistroVentasWeekly;

class Clientes extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'unique_id',
        'nombre',
        'apellido',
        'telefono',
        'direccion',
        'n_documento',
    ];
    protected static function boot()
    {
        parent::boot();

        static::created(function ($cliente) {
            RegistroVentasDaily::create([
                'cliente_id' => $cliente->unique_id,
                // Aquí puedes definir los valores por defecto para los otros campos
            ]);
            RegistroVentasWeekly::create([
                'cliente_id' => $cliente->unique_id,
                // Aquí puedes definir los valores por defecto para los otros campos
            ]);
        });
    }
}
