<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Pedido
 *
 * @property int $id
 * @property int $clienteId
 * @property int $estado
 * @property int $total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $metodopago
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereClienteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereMetodopago($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pedido whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Pedido extends Model
{
    //
}
