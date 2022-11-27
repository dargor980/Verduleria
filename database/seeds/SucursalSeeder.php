<?php

use Illuminate\Database\Seeder;
use App\Sucursal;

class SucursalSeeder extends Seeder
{
    protected $sucursales = [
        ['id' => 1, 'nombre' => 'Verduleria'],
        ['id' => 2, 'nombre' => 'Congelados']
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->sucursales as $sucursal){
            if((new Sucursal)->where('id', '=', $sucursal['id'])->doesntExist()){
                Sucursal::create([
                    'id' => $sucursal['id'],
                    'nombre' => $sucursal['nombre'],
                ]);
            }
        }
    }
}
