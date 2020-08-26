<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Contenido;

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
        $pedidos= Pedido::all();
        return view('Pedido.lista',compact('pedidos'));
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
        $request->validate([             //Validación de los campos del formulario
            'estado' => 'required'
        ]);

        $pedido= new Pedido();
        $pedido->clienteId= $request->clienteId;
        $pedido->estado= $request->estado;
        $pedido->total= 0;
        $pedido->save();
        return back()->with('mensaje','Pedido registrado');

    }

    public function addProductoToPedido(Request $request, $id)
    {
        $newProducto= new Contenido();
        $newProducto->pedidoId= id;
        $newProducto->productoId= $request->productoId;
        $newProducto->cantidad= $request->cantidad;

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
    public function show($id)
    {
        //
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
}
