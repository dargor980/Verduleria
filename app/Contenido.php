<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    protected $fillable=[
        'pedidoId', 'productoId','created_at', 'updated_at','cantidad','subtotal'
    ];
}
