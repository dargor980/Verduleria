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

    public function graficoGanancias()
    {
        $subquery="DATE_FORMAT(pedidos.created_at,'%d-%m-%Y') AS created_at";  //string que le cambia el formato a la fecha pedida en el query.
        $now= Carbon::now();                                                   //toma la fecha del día actual
        $old= Carbon::now()->add('-30','day');                                 // toma la fecha de 30 días atrás

        /* Consulta de la cual se obtiene las ganancias obtenidas de los productos vendidos de los últimos 30 días */
        $query= DB::table('contenidos')                           
                    ->join('productos','productos.id','contenidos.productoId')
                    ->join('pedidos','pedidos.id','contenidos.pedidoId')
                    ->whereBetween('pedidos.created_at',[$old,$now])
                    ->select(DB::raw('SUM(productos.ganancia*contenidos.cantidad) AS ganancia'), DB::raw($subquery))
                    ->groupBy('created_at')
                    ->get();
        
        /*formateo de la colección de datos obtenida en la consulta anterior para ser utilizado por chart.js */

        $ganancias=array();
        
        foreach($query as $row)
        {
            $ganancia=array(
                'fecha' => $row->created_at,
                'ganancia'   => $row->ganancia,
            );
            array_push($ganancias,$ganancia);

        }

        return $ganancias;
    }

    public function gananciasMesActual()
    {
        $total=0;
        $ganancias=EstadisticasController::graficoGanancias();
        foreach($ganancias as $value)
        {
            $total+=$value->ganancia;
        }
        return $total;
    }

    public function gananciasMesAnterior()
    {

    }

    public function masVendidos()
    {
        return view('Estadisticas.masVendidos');
    }

    public function clientesFrecuentes()
    { 
        $old=Carbon::now()->add('-10','day');
        $now=Carbon::now();
        $clientesFrecuentes= DB::table('clientes')
                                ->join('pedidos','clienteId','clientes.id')
                                ->whereBetween('pedidos.created_at',[$old,$now])
                                ->select('clientes.id','clientes.nombre','clientes.fono','clientes.domicilio','clientes.depto')
                                ->get();
        return view('Estadisticas.clientesFrecuentes');
                
    }


    public function topVerduleria()
    {

    }

    public function topCongelados()
    {

    }
    public function historialVentas()
    {
        return view('Estadisticas.historial');
        
    }
}
