<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Proveedor
 *
 * @property int $id
 * @property string|null $rut
 * @property string $nombre
 * @property string|null $empresa
 * @property string $fono
 * @property string|null $direccion
 * @property string|null $descripcion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor whereEmpresa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor whereFono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor whereRut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Proveedor extends Model
{
    protected $fillable = ['rut', 'nombre', 'empresa', 'fono', 'direccion', 'descripcion'];
}
