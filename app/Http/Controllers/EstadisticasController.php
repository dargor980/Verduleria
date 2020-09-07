<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Producto;
use App\Proveedor;
use App\Cliente;
use App\Contenido;
use Illuminate\Support\Facades\DB;


class EstadisticasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function masVendidos()
    {
        
    }

    public function clientesFrecuentes()
    {
        $clientesFrecuentes= DB::table('clientes')
                                ->join('pedidos','clienteId','clientes.id')
                                ->whereBetween('pedidos.created_at',[,])

    }

    public function historialVentas()
    {
        
    }
}
