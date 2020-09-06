<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Contenido;
use App\Cliente;
use App\Producto;
use App\Medida;
use App\Stock;
use Illuminate\Support\Facades\DB;

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
        $pedidos= Pedido::paginate(10);
        return view('Pedido.lista',compact('pedidos','clientes'));
    }

    public function indexClientesPedidos(){
        return Cliente::all();
    }

    public function indexProductos()
    {
        return Producto::all();

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pedido= new Pedido();
        $pedido->clienteId= $request->clienteId;
        $pedido->estado= $request->estado;
        $pedido->total= $request->total;
        $pedido->save();
        return $pedido;
    }

    public function addProductoToPedido(Request $request)
    {
        /*creación del un contenido del pedido */
        $newProducto= new Contenido();
        $newProducto->pedidoId=$request->pedidoId;
        $newProducto->productoId= $request->productoId;
        $newProducto->cantidad= $request->cantidad;

        $newProducto->save();
        
        return $newProducto;

    }

    public function updateStock(Request $request)
    {
        /*actualización inmediata del stock del producto de acuerdo a la cantidad seleccionada */
        
       
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

    public function addCliente(Request $request)
    {
        $cliente= new Cliente();
        $cliente->nombre= $request->nombre;
        $cliente->fono= $request->fono;
        $cliente->domicilio= $request->domicilio;
        $cliente->depto= $request->depto;
        $cliente->save();
        return $cliente;

    }

    public function SearchClienteById(Request $request)
    {
        $cliente= Cliente::find($request->id);
        return $cliente;
    }

    public function reporteClientePdf()
    {
        $data= Producto::all()->take(70);
        $reporte= \PDF::loadView('Pedido.reporte', compact('data'));

        return $reporte->download('export.pdf');
    }

    public function reporteClienteVista($id)
    {
        $productos= DB::table('contenidos')
                    ->join('productos','productoId','=','productos.id')
                    ->join('pedidos','pedidoId','=','pedidos.id')
                    ->where('contenidos.pedidoId','=',$id)
                    ->select('productos.id','productos.nombre','productos.medidaId','productos.precio','contenidos.cantidad')
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
}
