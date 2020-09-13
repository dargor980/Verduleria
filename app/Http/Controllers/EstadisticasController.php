<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Producto;
use App\Proveedor;
use App\Cliente;
use App\Contenido;
use App\Categoria;
use App\Stock;
use App\Medida;
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
        $subquery="DATE_FORMAT(pedidos.created_at,'%d-%m-%Y') AS created_at";  //string que le cambia el formato a la fecha pedida en el query.
        $now= Carbon::now();                                                   //toma la fecha del día actual
        $old= Carbon::now()->add('-30','day');    
        /* Consulta de la cual se obtiene las ganancias obtenidas de los productos vendidos de los últimos 30 días */
        $query= DB::table('contenidos')                           
                    ->join('productos','productos.id','contenidos.productoId')
                    ->join('pedidos','pedidos.id','contenidos.pedidoId')
                    ->whereBetween('pedidos.created_at',[$old,$now])
                    ->select(DB::raw('SUM(productos.ganancia*contenidos.cantidad) AS ganancia'), DB::raw($subquery))
                    ->groupBy('created_at')
                    ->get();   
        /*suma de las ganancias */
        foreach($query as $row)
        {
            $total+=$row->ganancia;
        }  
        return [$total,$now->format('d-m-Y'),$old->format('d-m-Y')];
    }

    public function gananciasMesAnterior()
    {
        $total=0;
        $subquery="DATE_FORMAT(pedidos.created_at,'%d-%m-%Y') AS created_at";  //string que le cambia el formato a la fecha pedida en el query.
        $now= Carbon::now()->add('-30','day');                                                   //toma la fecha del día actual
        $old= Carbon::now()->add('-60','day');    
        /* Consulta de la cual se obtiene las ganancias obtenidas de los productos vendidos de los últimos 30 días */
        $query= DB::table('contenidos')                           
                    ->join('productos','productos.id','contenidos.productoId')
                    ->join('pedidos','pedidos.id','contenidos.pedidoId')
                    ->whereBetween('pedidos.created_at',[$old,$now])
                    ->select(DB::raw('SUM(productos.ganancia*contenidos.cantidad) AS ganancia'), DB::raw($subquery))
                    ->groupBy('created_at')
                    ->get();   
        foreach($query as $row)
        {
            $total+=$row->ganancia;
        }  
        return [$total,$now->format('d-m-Y'),$old->format('d-m-Y')];
    }

    public function masVendidos()
    {
        return view('Estadisticas.masVendidos');
    }

    
    public function clientesFrecuentes()
    { 
       
        return view('Estadisticas.clientesFrecuentes');
                
    }  


    public function topVerduleria()
    {
        $old= Carbon::now()->add('-30','day');
        $now= Carbon::now();
        $query= DB::table('contenidos')
                ->join('productos','productos.id','contenidos.productoId')
                ->join('categorias','categorias.id','productos.categoriaId')
                ->join('sucursals','sucursals.id','categorias.sucursalId')
                ->whereBetween('contenidos.created_at',[$old,$now])
                ->where('sucursals.nombre','=','Verduleria')
                ->select('productos.id','productos.nombre', DB::raw('SUM(contenidos.cantidad) AS cantidad'))
                ->groupBy('productos.nombre','productos.id')
                ->limit(5)
                ->orderBy('cantidad','DESC')
                ->get();
        $top=array();
        foreach($query as $row)
        {
            $aux=array(
                'id' => $row->id,
                'nombre' => $row->nombre,
                'cantidad' => $row->cantidad,
            );

            array_push($top,$aux);
        }

        return $top;
    }

    public function topCongelados()
    {
        $old= Carbon::now()->add('-30','day');
        $now= Carbon::now();
        $query= DB::table('contenidos')
                ->join('productos','productos.id','contenidos.productoId')
                ->join('categorias','categorias.id','productos.categoriaId')
                ->join('sucursals','sucursals.id','categorias.sucursalId')
                ->whereBetween('contenidos.created_at',[$old,$now])
                ->where('sucursals.nombre','=','Congelados')
                ->select('productos.id','productos.nombre', DB::raw('SUM(contenidos.cantidad) AS cantidad'))
                ->groupBy('productos.nombre','productos.id')
                ->limit(5)
                ->orderBy('cantidad','DESC')
                ->get();
        $top=array();
        foreach($query as $row)
        {
            $aux=array(
                'id' => $row->id,
                'nombre' => $row->nombre,
                'cantidad' => $row->cantidad,
            );

            array_push($top,$aux);
        }

        return $top;

    }
    public function historialVentas()
    {
        

        return view('Estadisticas.historial');
        
    }
/*Estadísticas para vista clientes frecuentes-------------------------------*/
    public function topMayorMonto()
    {
        $old= Carbon::now()->add('-30','day');
        $now= Carbon::now();

        $query= DB::table('clientes')
                     ->join('pedidos','pedidos.clienteId','clientes.id')
                     ->whereBetween('pedidos.created_at',[$old,$now])
                     ->select('clientes.nombre', DB::raw('SUM(pedidos.total) AS monto'))
                     ->groupBy('clientes.nombre')
                     ->limit(5)
                     ->orderBy('monto','DESC')
                     ->get();

        $mayorMonto=array();
        
        foreach($query as $row)
        {
            $aux= array(
                'nombre' => $row->nombre,
                'monto' => $row->monto,
            );

            array_push($mayorMonto,$aux);
        }

        return $mayorMonto;
    }

    public function topCantPedidos()
    {
        $old= Carbon::now()->add('-30','day');
        $now= Carbon::now();
        $query= DB::table('clientes')
                      ->join('pedidos','pedidos.clienteId','clientes.id')
                      ->whereBetween('pedidos.created_at',[$old,$now])
                      ->select('clientes.nombre',DB::raw('COUNT(*) AS cantidad'))
                      ->groupBy('clientes.nombre')
                      ->limit(5)
                      ->orderBy('cantidad','DESC')
                      ->get();

        $cantPedidos=array();
        foreach($query as $row)
        {
            $aux= array(
                'nombre' => $row->nombre,
                'cantidad' => $row->cantidad,
            );

            array_push($cantPedidos,$aux);
        }
        
        return $cantPedidos;

    }
/*/Estadísticas para vista clientes frecuentes-------------------------------*/


/*Estadísticas para vista mas vendidos-----------------------------------------*/

public function prodMasVendidos()
{
    $old=Carbon::now()->add('-30','day');
    $now=Carbon::now();
    $query= DB::table('productos')
            ->join('contenidos','contenidos.productoId','productos.id')
            ->join('categorias','productos.categoriaId','categorias.id')
            ->join('medidas','productos.medidaId','medidas.id')
            ->whereBetween('contenidos.created_at',[$old,$now])
            ->select('productos.nombre','categorias.tipo',DB::raw('medidas.nombre AS medida'),DB::raw('SUM(contenidos.cantidad) AS cantidad'))
            ->groupBy('productos.nombre','categorias.tipo','medida')
            ->limit(10)
            ->orderBy('cantidad','DESC')
            ->get();

    $masVendidos=array();
    foreach($query as $row)
    {
        $aux=array(
            'nombre' => $row->nombre,
            'categoria' => $row->tipo,
            'cantidad' => $row->cantidad,
            'medida' => $row->medida,        
        );

        array_push($masVendidos,$aux);
    }

    return $masVendidos;

}

public function masVendidosPorCategorias()
{
    $old=Carbon::now()->add('-30','day');
    $new=Carbon::now();

    $query=DB::table('');

}

public function masVendidosCongelados()
{

}

public function masVendidosVerduleria()
{

}





/*/Estadísticas para vista mas vendidos-----------------------------------------*/



}
