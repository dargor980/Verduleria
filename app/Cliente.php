<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Cliente
 *
 * @property int $id
 * @property string $nombre
 * @property string $fono
 * @property string $domicilio
 * @property string|null $depto
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereDepto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereDomicilio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereFono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Cliente extends Model
{
    protected $fillable = ['nombre', 'fono', 'domicilio', 'depto'];

    public function pedido(){
        return $this->belongsTo(Pedido::class, 'clienteId');
    }
}
