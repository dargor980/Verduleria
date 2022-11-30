<?php

use Illuminate\Database\Seeder;
use App\Proveedor;

class ProveedorSeeder extends Seeder
{
    protected $proveedores = [
        ['id' => 1, 'rut' => '12345678-9','nombre' => 'Germán Contreras Améstica', 'empresa' => 'Empresa ejemplo', 'fono' => '56952211100', 'direccion' => 'direccion 123', 'descripcion' => 'proveedor de ejemplo'],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->proveedores as $proveedor){
            if((new Proveedor)->where('id', '=', $proveedor['id'])->doesntExist()){
                Proveedor::create([
                    'id' => $proveedor['id'],
                    'rut' => $proveedor['rut'],
                    'nombre' => $proveedor['nombre'],
                    'empresa' => $proveedor['empresa'],
                    'fono' => $proveedor['fono'],
                    'direccion' => $proveedor['direccion'],
                    'descripcion' => $proveedor['descripcion'],
                ]);
            }
        }
    }
}
