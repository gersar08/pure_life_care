<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;


class RegistroVentasWeekly extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'fardos', 'garrafas', 'pet', 'total'];
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'unique_id');
    }
}
