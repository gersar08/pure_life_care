<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $table = 'facturas';
    protected $fillable = [
        'cliente_id',
        'producto_name',
        'precio',
        'cantidad',
        'subtotal',
        'total'
    ];
}
