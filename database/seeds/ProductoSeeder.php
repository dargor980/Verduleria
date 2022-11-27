<?php

use Illuminate\Database\Seeder;
use App\Stock;
use App\Producto;

class ProductoSeeder extends Seeder
{

    protected $stocks = [
        ['id' => 1, 'cantidad' => 1000],
        ['id' => 2, 'cantidad' => 1000],
        ['id' => 3, 'cantidad' => 1000],
        ['id' => 4, 'cantidad' => 1000],
        ['id' => 5, 'cantidad' => 1000],
        ['id' => 6, 'cantidad' => 1000],
        ['id' => 7, 'cantidad' => 1000],
        ['id' => 8, 'cantidad' => 1000],
        ['id' => 9, 'cantidad' => 1000],
        ['id' => 10, 'cantidad' => 1000],
    ];
    protected $productos = [
        ['id' => 1, 'medidaId' => 2, 'nombre' => 'Mantequilla Kumey', 'precio' => 2500, 'categoriaId' => 3, 'stockId' => 1, 'costo' => 2200, 'ganancia' => 300],
        ['id' => 2, 'medidaId' => 2, 'nombre' => 'Mantequilla Colún', 'precio' => 2500, 'categoriaId' => 3, 'stockId' => 2, 'costo' => 2100, 'ganancia' => 400],
        ['id' => 3, 'medidaId' => 2, 'nombre' => 'Pimentón Amarillo', 'precio' => 1200, 'categoriaId' => 2, 'stockId' => 3, 'costo' => 800, 'ganancia' => 400],
        ['id' => 4, 'medidaId' => 2, 'nombre' => 'Pimentón Verde', 'precio' => 800, 'categoriaId' => 2, 'stockId' => 4, 'costo' => 600, 'ganancia' => 200],
        ['id' => 5, 'medidaId' => 1, 'nombre' => 'Tomate Cherry', 'precio' => 3600, 'categoriaId' => 1, 'stockId' => 5, 'costo' => 3200, 'ganancia' => 400],
        ['id' => 6, 'medidaId' => 1, 'nombre' => 'Tomates', 'precio' => 1800, 'categoriaId' => 1, 'stockId' => 6, 'costo' => 1400, 'ganancia' => 400],
        ['id' => 7 , 'medidaId' => 3, 'nombre' => 'Carbón Espino', 'precio' => 2500, 'categoriaId' => 13, 'stockId' => 7, 'costo' => 2000, 'ganancia' => 500],
        ['id' => 8, 'medidaId' => 2, 'nombre' => 'Pimientos Rojos', 'precio' => 1200, 'categoriaId' => 2, 'stockId' => 8, 'costo' => 800, 'ganancia' => 400],
        ['id' => 9, 'medidaId' => 1, 'nombre' => 'Kiwi', 'precio' => 2800, 'categoriaId' => 1, 'stockId' => 9, 'costo' => 2500, 'ganancia' => 300],
        ['id' => 10, 'medidaId' => 1, 'nombre' => 'Huesillos', 'precio' => 6800, 'categoriaId' => 12, 'stockId' => 10, 'costo' => 5800, 'ganancia' => 1000],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->stocks as $stock){
            if((new Stock)->where('id', '=', $stock['id'])->doesntExist()){
                Stock::create([
                    'id' => $stock['id'],
                    'cantidad' => $stock['cantidad'],
                ]);
            }
        }

        foreach($this->productos as $producto){
            if((new Producto)->where('id', '=', $producto['id'])->doesntExist()){
                Producto::create([
                    'id' => $producto['id'],
                    'medidaId' => $producto['medidaId'],
                    'nombre' => $producto['nombre'],
                    'precio' => $producto['precio'],
                    'categoriaId' => $producto['categoriaId'],
                    'stockId' => $producto['stockId'],
                    'costo' => $producto['costo'],
                    'ganancia' => $producto['ganancia'],
                ]);
            }
        }
    }
}
