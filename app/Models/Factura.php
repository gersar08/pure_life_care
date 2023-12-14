<?php

namespace App\Models;

use App\Models\Clientes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Factura extends Model
{

    use HasFactory;

    protected $table = 'facturas';

    protected $fillable = [
        'cliente_id', 'archivo_pdf'
    ];

    public function cliente()
    {
        return $this->belongsTo(Clientes::class, 'cliente_id', 'unique_id');
    }
}
