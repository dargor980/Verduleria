<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Producto;
use App\Proveedor;
use App\Cliente;
use App\Contenido;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class EstadisticasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function masVendidos()
    {
        return view('Estadisticas.masVendidos');
    }

    public function clientesFrecuentes()
    { 
        $old=Carbon::now()->add('-10','month');
        $now=Carbon::now();
        $clientesFrecuentes= DB::table('clientes')
                                ->join('pedidos','clienteId','clientes.id')
                                ->whereBetween('pedidos.created_at',[$old,$now])
                                ->select('clientes.id','clientes.nombre','clientes.fono','clientes.domicilio','clientes.depto')
                                ->get();
        return view('Estadisticas.clientesFrecuentes');
                
    }

    public function historialVentas()
    {
        return view('Estadisticas.historial');
        
    }
}
