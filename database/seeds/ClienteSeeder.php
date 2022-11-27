<?php

use Illuminate\Database\Seeder;
use App\Cliente;

class ClienteSeeder extends Seeder
{

    protected $clientes = [
        ['id' => 1, 'nombre' => 'Germán Contreras', 'fono' => '952210010', 'domicilio' => 'direccion 123', 'depto' => '22'],
        ['id' => 2, 'nombre' => 'Braulio Argandoña', 'fono' => '999999999', 'domicilio' => 'direccion 12345', 'depto' => '123']
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->clientes as $cliente){
            if((new Cliente)->where('id', '=', $cliente['id'])->doesntExist()){
                Cliente::create([
                    'id' => $cliente['id'],
                    'nombre' => $cliente['nombre'],
                    'fono' => $cliente['fono'],
                    'domicilio' => $cliente['domicilio'],
                    'depto' => $cliente['depto']
                ]);
            }
        }
    }
}
