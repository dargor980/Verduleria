<?php

use Illuminate\Database\Seeder;
use App\Medida;

class MedidaSeeder extends Seeder
{
    protected $medidas = [
        ['id' => 1, 'nombre' => 'Kg'],
        ['id' => 2, 'nombre' => 'Unidad'],
        ['id' => 3, 'nombre' => 'Paquete'],
        ['id' => 4, 'nombre' => 'Docena'],
        ['id' => 5, 'nombre' => 'Media Docena'],
        ['id' => 6, 'nombre' => '1/4'],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->medidas as $medida){
            if((new Medida)->where('id', '=', $medida['id'])->doesntExist()){
                Medida::create([
                    'id' => $medida['id'],
                    'nombre' => $medida['nombre']
                ]);
            }
        }
    }
}
