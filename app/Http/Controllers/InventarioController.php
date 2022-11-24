<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
use App\Sucursal;
use App\Stock;
use App\Medida;
use Symfony\Component\VarDumper\Cloner\Data;
use Yajra\DataTables\DataTables;

class InventarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $stocks=Stock::all();
        $productos=Producto::orderBy('nombre')->paginate(12);
        $categorias=Categoria::all();
        $medidas= Medida::all();
        return view('Inventario.new',compact('stocks','productos','categorias','medidas'));
    }

    public function showverduleria()
    {
        return view('Inventario.listaverduleria');
    }

    /**
     * @throws \Exception
     */
    public function getProductosVerduleria(){
        $productos = Producto::with([
            'categoria',
            'medida',
            'stock'
        ])
        ->whereHas('categoria', function($query){
            $query->where('sucursalId', '=', 1);
        })
        ->select('*');

        return DataTables::of($productos)
            ->make(true);
    }

    public function showcongelados()
    {
        return view('Inventario.listacongelados');
    }

    public function getProductosCongelados()
    {
        $productos = Producto::with([
            'categoria',
            'medida',
            'stock',
        ])
        ->whereHas('categoria', function($query){
            $query->where('sucursalId', '=', 2);
        })
        ->select('*');





        return DataTables::of($productos)
            ->make(true);

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
