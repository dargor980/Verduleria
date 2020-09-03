<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Contenido;
use App\Cliente;
use App\Producto;
use App\Medida;

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
        $pedidos= Pedido::paginate(10);
        return view('Pedido.lista',compact('pedidos'));
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
        $newProducto= new Contenido();
        $newProducto->pedidoId=$request->pedidoId;
        $newProducto->productoId= $request->productoId;
        $newProducto->cantidad= $request->cantidad;

        $newProducto->save();
        return $newProducto;

    }

    public function removeProductoToPedido()
    {

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
        //
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
        $reporte= \PDF::loadView('Pedido.reporte');

        return $reporte->download('export.pdf');
    }

    public function indexMedidasProductos(){
        return Medida::all();
    }
}
