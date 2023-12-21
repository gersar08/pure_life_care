<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroVentasDaily extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla
    protected $table = 'registro_ventas_daily';
    protected $fillable = [
        'cliente_id',
        'fardos',
        'garrafas',
        'pet',
    ];
}
