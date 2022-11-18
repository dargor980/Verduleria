<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Producto
 *
 * @property int $id
 * @property int $medidaId
 * @property string $nombre
 * @property int $precio
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $categoriaId
 * @property int $stockId
 * @property int $costo
 * @property int $ganancia
 * @method static \Illuminate\Database\Eloquent\Builder|Producto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto query()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereCategoriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereCosto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereGanancia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereMedidaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereStockId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Producto extends Model
{
    protected $fillable = ['nombre', 'precio', 'medidaId', 'categoriaId', 'stockId', 'costo', 'ganancia'];
}
