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


    public function searchProductoPedido(Request $request)
    {
        $search= $request->search;

        $producto = Producto::with(['stock'])
            ->whereHas('stock', function ($query){
                $query->where('cantidad' ,'>', 0);
            })
            ->where('nombre', 'LIKE', '%'.$search. '%')
            ->select('*')
            ->orderBy('nombre', 'ASC')
            ->get();

        return $producto;
    }

    public function searchClientePedido(Request $request)
    {
        $search= $request->search;
        $cliente= Cliente::where('nombre','LIKE','%'.$search.'%')->get();
        return $cliente;
    }
}
