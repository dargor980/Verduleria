<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Producto;
use App\Pedido;
use App\Proveedor;
use App\Contenido;
use App\Medida;
use App\Categoria;
use App\Stock;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function searchProducto(Request $request)
    {
        $search= $request->search;
        $producto= Producto::where('nombre','LIKE','%'.$request->search.'%')->paginate(20);
        $medidas= Medida::all();
        $categorias= Categoria::all();
        return view('Producto.buscar',compact('producto','categorias','medidas','search'));
    }

    public function searchProductoPedido(Request $request)
    {
        $search= $request->search;

        $producto= DB::table('productos')
                   ->join('stocks','stockId','stocks.id')
                   ->where('stocks.cantidad','>',0)
                   ->where('productos.nombre','LIKE','%'.$request->search.'%')
                   ->select('*')
                   ->orderBy('productos.nombre','ASC')
                   ->get();
        $medidas= Medida::all();
        $categorias= Categoria::all();
        return $producto;
    }

    public function searchProveedor(Request $request)
    {
        $search= $request->search;
        $proveedor= Proveedor::where('nombre','LIKE','%'.$request->search.'%')->paginate(20);
        return view('Proveedores.buscar',compact('proveedor','search'));
    }

    public function searchInventarioVerduleria()
    {
        return view('Inventario.buscar');
    }
    
    public function searchPedido()
    {


    }

    public function searchPedidosPendientes()
    {

    }

    public function searchProductoVerduleria(Request $request)
    {
        $search= $request->search;
        $productos= DB::table('productos')
                    ->join('categorias','categoriaId','=','categorias.id')
                    ->join('sucursals','sucursalId','=','sucursals.id')
                    ->join('stocks','stockId','=','stocks.id')
                    ->where('sucursals.nombre','=','Verduleria')
                    ->where('productos.nombre','LIKE','%'.$request->search.'%')
                    ->select('productos.id','productos.nombre','productos.precio','productos.stockId','productos.medidaId','productos.categoriaId')
                    ->paginate(20);
        $categorias= Categoria::where('sucursalId','=',1)->get();
        $stocks= Stock::all();
        $medidas= Medida::all();

        return view('Inventario.buscar',compact('productos','categorias','stocks','medidas','search'));
    }

    public function searchProductoCongelados(Request $request)
    {
        $search= $request->search;
        $productos= DB::table('productos')
                            ->join('categorias','categoriaId','=','categorias.id')
                            ->join('sucursals','sucursalId','=','sucursals.id')
                            ->where('sucursals.nombre','=','Congelados')
                            ->where('productos.nombre','LIKE','%'.$request->search.'%')
                            ->select('productos.id','productos.nombre','productos.precio','productos.stockId','productos.medidaId','productos.categoriaId')
                            ->paginate(18);
        $categorias= Categoria::all();
        $stocks= Stock::all();
        $medidas= Medida::all();
       

        return view('Inventario.buscar',compact('productos','categorias','stocks','medidas','search'));
    }

    public function searchCliente(Request $request)
    {
        $search= $request->search;
        $cliente= Cliente::where('nombre','LIKE','%'.$request->search.'%')->paginate(20);

        return view('Cliente.buscar',compact('cliente','search'));       
    }
}
