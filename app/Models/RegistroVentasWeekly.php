<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;


class RegistroVentasWeekly extends Model
{
    use HasFactory;
    protected $table = 'registro_ventas_weekly';
    protected $fillable = ['cliente_id', 'fardos', 'garrafas', 'pet'];

}
