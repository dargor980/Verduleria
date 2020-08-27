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

    public function searchProducto()
    {

    }

    public function searchProveedor()
    {

    }
    
    public function searchPedido()
    {

    }

    public function searchPedidosPendientes()
    {

    }

    public function searchCliente()
    {
        
    }
}
