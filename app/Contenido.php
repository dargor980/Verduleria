<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Contenido
 *
 * @property int $id
 * @property int $pedidoId
 * @property int $productoId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property float $cantidad
 * @property int $subtotal
 * @method static \Illuminate\Database\Eloquent\Builder|Contenido newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contenido newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contenido query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contenido whereCantidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contenido whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contenido whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contenido wherePedidoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contenido whereProductoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contenido whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contenido whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Contenido extends Model
{
    protected $fillable=[
        'pedidoId', 'productoId','created_at', 'updated_at','cantidad','subtotal'
    ];

    public function contenido(){
        return $this->hasMany(Pedido::class, 'id', 'pedidoId');
    }

    public function producto(){
        return $this->hasMany(Producto::class, 'id', 'productoId');
    }
}
