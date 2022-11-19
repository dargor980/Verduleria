<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Medida
 *
 * @property int $id
 * @property string $nombre
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Medida newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Medida newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Medida query()
 * @method static \Illuminate\Database\Eloquent\Builder|Medida whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medida whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medida whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medida whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Medida extends Model
{
    protected $fillable = ['nombre'];

    public function producto(){
        return $this->belongsTo(Producto::class, 'medidaId');
    }
}
