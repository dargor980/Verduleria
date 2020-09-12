<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
use App\Sucursal;
use App\Stock;
use App\Medida;

class InventarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $stocks=Stock::all();
        $productos=Producto::paginate(5);
        $categorias=Categoria::all();
        $medidas= Medida::all();
        return view('Inventario.new',compact('stocks','productos','categorias','medidas'));
    }

    public function showverduleria()
    {
        $productos= DB::table('productos')
                    ->join('categorias','categoriaId','=','categorias.id')
                    ->join('sucursals','sucursalId','=','sucursals.id')
                    ->where('sucursals.nombre','=','Verduleria')
                    ->select('productos.id','productos.nombre','productos.medidaId','productos.precio','productos.categoriaId','productos.stockId')
                    ->paginate(15);
        
        $categorias= Categoria::all();
        $stocks= Stock::all();
        $medidas= Medida::all();
        return view('Inventario.listaverduleria',compact('productos','categorias','stocks','medidas'));
    }

    public function showcongelados()
    {
        $productos= DB::table('productos')
                    ->join('categorias','categoriaId','=','categorias.id')
                    ->join('sucursals','sucursalId','=','sucursals.id')
                    ->where('sucursals.nombre','=','Congelados')
                    ->select('productos.id','productos.nombre','productos.medidaId','productos.precio','productos.categoriaId','productos.stockId')
                    ->paginate(15);

        $categorias=Categoria::all();
        $stocks= Stock::all();
        $medidas= Medida::all();                    
        return view('Inventario.listacongelados',compact('productos','stocks','medidas','categorias'));
    }

    public function updateStock(Request $request)
    {
        $request->validate([
            'cantidad' => 'required',
            'stockId' => 'required|not_in:0'
        ]);
        $stock= Stock::find($request->stockId);
        $stock->cantidad= $request->cantidad;
        $stock->save();

        return back()->with('mensaje','Stock del producto actualizado');
        
    }
}
