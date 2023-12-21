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
}
