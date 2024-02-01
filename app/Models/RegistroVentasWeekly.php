<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RegistroVentasWeekly extends Model
{
    use HasFactory;
    protected $table = 'registro_ventas_weekly';
    protected $fillable = ['cliente_id', 'fardo', 'garrafa', 'pet'];

}
