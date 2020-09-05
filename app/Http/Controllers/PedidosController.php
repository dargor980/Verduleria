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
        $producto= Producto::where('id','=',$request->productoId)->get();
        $updateStock= Stock::where('id','=',$producto->stockId)->get();
        $cantidad= Contenido::where('productoId','=',$request->productoId)->get();
        $updateStock->cantidad= ($updateStock->cantidad) - ($cantidad->cantidad);
        $updateStock->save();
        
       
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

    public function reporteClienteVista()
    {
        $data= Producto::all()->take(70);

        return view('Pedido.detalles', compact('data'));
    }


    public function indexMedidasProductos(){
        return Medida::all();
    }
}
