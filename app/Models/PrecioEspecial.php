<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrecioEspecial extends Model
{
    use HasFactory;
    protected $table = 'precio_especial';
    protected $fillable = [
        'client_id',
        'product_name',
        'precio_especial',
    ];
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'client_id', 'unique_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'product_name', 'producto_name');
    }
}
