<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriaSeeder extends Seeder
{

    protected $categorias = [
        ['id' => 1, 'tipo' => 'Frutas', 'sucursalId' => 1],
        ['id' => 2, 'tipo' => 'Verduras',  'sucursalId' => 1],
        ['id' => 3, 'tipo' => 'Lacteos',  'sucursalId' => 1],
        ['id' => 4, 'tipo' => 'Aceitunas y Pickles',  'sucursalId' => 1],
        ['id' => 5, 'tipo' =>'Aceites y Vinagres',  'sucursalId' => 1],
        ['id' => 6, 'tipo' => 'Frutos secos',  'sucursalId' => 1],
        ['id' => 7, 'tipo' => 'Legumbres y Huevos',  'sucursalId' => 1],
        ['id' => 8, 'tipo' => 'Salsas y Aderezos',  'sucursalId' => 1],
        ['id' => 9, 'tipo' => 'Te y Miel',  'sucursalId' => 1],
        ['id' => 10, 'tipo' => 'Especias y Condimentos',  'sucursalId' => 1],
        ['id' => 11, 'tipo' => 'Conservas',  'sucursalId' => 1],
        ['id' => 12, 'tipo' => 'Granos y Cereales',  'sucursalId' => 1],
        ['id' => 13, 'tipo' => 'Otros',  'sucursalId' => 1],
        ['id' => 14, 'tipo' => 'Semillas',  'sucursalId' => 1],
        ['id' => 15, 'tipo' => 'Frituras',  'sucursalId' => 2],
        ['id' => 16, 'tipo' => 'Dulces',  'sucursalId' => 1],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->categorias as $categoria){
            if((new Categoria)->where('id', '=', $categoria['id'])->doesntExist()){
                Categoria::create([
                    'id' => $categoria['id'],
                    'tipo' => $categoria['tipo'],
                    'sucursalId' => $categoria['sucursalId'],
                ]);
            }
        }
    }
}
