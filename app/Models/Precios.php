<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precios extends Model
{
    use HasFactory;
    protected $fillable = ['unique_id', 'producto_name', 'precio_base'];

    public function producto()
    {
        return $this->belongsTo(Productos::class);
    }

}
