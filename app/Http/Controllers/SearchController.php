<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Producto;
use App\Pedido;
use App\Proveedor;
use App\Contenido;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function searchProducto(Request $request)
    {
        $producto= Producto::where('nombre','LIKE',`%$request->search%`)->get();
        return view('Producto.buscar',compact('producto'));

    }

    public function searchProveedor(Request $request)
    {
        $proveedor= Proveedor::where('nombre','LIKE',`%$request->search%`)->get();
        return view('Proveedores.buscar',compact('proveedor'));
    }

    public function searchInventario()
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
        $productoVerduleria= DB::table('productos')
                            ->join('categorias','categoriaId','=','categorias.id')
                            ->join('sucursals','sucursalId','=','sucursals.id')
                            ->where('sucursals.nombre','=','Verduleria')
                            ->where('productos.nombre','LIKE',`%$request->search%`)
                            ->select('productos.id','productos.nombre','productos.precio','productos.cantidad','productos.stockId','productos.medidaId','productos.categoriaId')
                            ->get();
        $categoria= Categoria::where('id','=',$productoVerduleria->categoriaId)->get();
        $stock= Stock::where('id','=',$productoVerduleria->stockId)->get();
        $medida= Medida::where('id','=',$productoVerduleria->medidaId);

        return view('Inventario.resultadoBusqueda',compact('productoVerduleria','categoria','stock','medida'));
    }

    public function searchProductoCongelados()
    {

        $productoVerduleria= DB::table('productos')
                            ->join('categorias','categoriaId','=','categorias.id')
                            ->join('sucursals','sucursalId','=','sucursals.id')
                            ->where('sucursals.nombre','=','Congelados')
                            ->where('productos.nombre','LIKE',`%$request->search%`)
                            ->select('productos.id','productos.nombre','productos.precio','productos.cantidad','productos.stockId','productos.medidaId','productos.categoriaId')
                            ->get();
        $categoria= Categoria::where('id','=',$productoVerduleria->categoriaId)->get();
        $stock= Stock::where('id','=',$productoVerduleria->stockId)->get();
        $medida= Medida::where('id','=',$productoVerduleria->medidaId);

        return view('Inventario.resultadoBusqueda',compact('productoVerduleria','categoria','stock','medida'));

    }

    public function searchCliente(Request $request)
    {
        $cliente= Cliente::where('nombre','LIKE',`%$request->search%`)->get();

        return view('Cliente.buscar',compact('cliente'));
        
    }
}
