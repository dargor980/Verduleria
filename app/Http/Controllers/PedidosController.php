<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Contenido;
use App\Cliente;
use App\Producto;
use App\Medida;
use App\Stock;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\NewClienteRequest;
use App\Http\Requests\NewPedidoRequest;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index']]);
    }
    public function index()
    {
        $clientes= Cliente::all();
        $pedidos= DB::table('pedidos')
                  ->select('pedidos.id','pedidos.clienteId',DB::raw('DATE_FORMAT(pedidos.created_at,"%d-%m-%Y") AS created_at'),'pedidos.total','pedidos.estado', 'pedidos.metodopago')
                  ->orderBy('pedidos.id','DESC')
                  ->paginate(18);

        return view('Pedido.lista',compact('pedidos','clientes'));
    }

    public function indexClientesPedidos(){
        return Cliente::all();
    }

    public function indexProductos()
    {
        $productos= DB::table('productos')
                    ->join('stocks','stockId','stocks.id')
                    ->where('stocks.cantidad','>',0)
                    ->orderBy('productos.nombre','ASC')
                    ->get();
        return $productos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pedido.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(NewPedidoRequest $request)
    {
        $metodoPago = [
            '1' => 1,
            '2' => 0,
            '3' => 1,
        ];

        $pedido = Pedido::create([
            'clienteId' => $request->clienteId,
            'total' => $request->total,
            'estado' => $metodoPago[$request->metodopago],
            'metodopago' => $request->metodopago,
        ]);

        return $pedido;
    }

    public function addProductoToPedido(Request $request)
    {

        foreach($request->all() as $req)
        {
            $producto= Producto::find($req['productoId']);
            if(!isset($req['cantidad'])) {
                $req['cantidad']=0;
            }

            Contenido::create([
                'pedidoId' => $req['pedidoId'],
                'productoId' =>$req['productoId'],
                'cantidad' => $req['cantidad'],
                'subtotal' => $req['cantidad']*$producto->precio,
            ]);
        }

        return;
    }

    public function updateStock(Request $request)
    {
        foreach($request->all() as $req)
        {
            $producto=Producto::find($req['productoId']);
            $id=$producto->stockId;
            $stock= Stock::where('id','=',$id)->get();
            foreach($stock as $val)
            {
                $val->cantidad= $val->cantidad-$req['cantidad'];
                $val->update();
            }
        }
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('Pedido.detalles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contenido= Contenido::where('pedidoId','=',$id)->get();
        foreach($contenido as $item)
        {
            $item->delete();
        }
        $pedido= Pedido::find($id);
        $pedido->delete();
        return back()->with('mensaje','Pedido eliminado');
    }

    public function CreatePdfReport()
    {

    }

    public function addCliente(NewClienteRequest $request)
    {
        $cliente = Cliente::create([
            'nombre' => $request->nombre,
            'fono' => $request->fono,
            'domicilio' => $request->domicilio,
            'depto' => $request->depto,
        ]);

        return $cliente;
    }

    public function SearchClienteById(Request $request)
    {
        return Cliente::find($request->id);
    }

    public function reporteClientePdf($id)
    {
        $productos= DB::table('contenidos')
        ->join('productos','productoId','=','productos.id')
        ->join('pedidos','pedidoId','=','pedidos.id')
        ->where('contenidos.pedidoId','=',$id)
        ->select('productos.id','productos.nombre','productos.medidaId','productos.precio','contenidos.cantidad','contenidos.subtotal')
        ->get();

        $datosCliente= DB::table('pedidos')
        ->join('clientes','clienteId','clientes.id')
        ->where('pedidos.id','=',$id)
        ->select('clientes.nombre','clientes.domicilio','clientes.fono','clientes.depto')->distinct('clientes.nombre')->get();

        $medidas= Medida::all();

        $pedido= Pedido::findOrFail($id);

        $reporte= \PDF::loadView('Pedido.reporte', compact('productos','datosCliente','medidas','pedido'));

        return $reporte->download('pedido'.$id.'.pdf');
    }

    public function reporteClienteVista($id)
    {
        $productos= DB::table('contenidos')
                    ->join('productos','productoId','=','productos.id')
                    ->join('pedidos','pedidoId','=','pedidos.id')
                    ->where('contenidos.pedidoId','=',$id)
                    ->select('productos.id','productos.nombre','productos.medidaId','productos.precio','contenidos.cantidad','contenidos.subtotal')
                    ->get();

        $datosCliente= DB::table('pedidos')
        ->join('clientes','clienteId','clientes.id')
        ->where('pedidos.id','=',$id)
        ->select('clientes.nombre','clientes.domicilio','clientes.fono','clientes.depto')->distinct('clientes.nombre')->get();

        $medidas= Medida::all();

        $pedido= Pedido::find($id);

        return view('Pedido.detalles', compact('productos','datosCliente','medidas','pedido'));
    }


    public function indexMedidasProductos(){
        return Medida::all();
    }

    public function administrarPagos()
    {
        $pendientes= DB::table('pedidos')
                     ->join('clientes','clienteId','clientes.id')
                     ->where('pedidos.estado','=',0)
                     ->where('pedidos.metodopago','=',2)
                     ->select('pedidos.id','clientes.nombre',DB::raw('DATE_FORMAT(pedidos.created_at,"%d-%m-%Y") AS created_at'),'pedidos.total','pedidos.metodopago')
                     ->orderBy('pedidos.id','DESC')
                     ->paginate(18);
        return view('Pedido.adminpagos',compact('pendientes'));
    }

    public function marcarPagado($id)
    {
        Pedido::find($id)->update([
            'estado' => 1
        ]);
        return back()->with('mensaje','El pedido ya está pagado');
    }
}
