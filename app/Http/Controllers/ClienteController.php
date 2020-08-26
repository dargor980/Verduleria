<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth',['except'=> ['index']]);
    }
    public function index()
    {
        $clientes= Cliente::all();
        return view('Cliente.lista',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cliente.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([            //Validación de los campos del formulario
            'nombre' => 'required',
            'fono' => 'required',
            'domicilio' => 'required'
        ]);

        $cliente= new Cliente();
        $cliente->nombre= $request->nombre;
        $cliente->fono= $request->fono;
        $cliente->domicilio= $request->domicilio;
        $cliente->depto= $request->depto;

        $cliente->save();
        return back()->with('mensaje','Cliente añadido');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente= Cliente::find($id);
        return view('Cliente.detalles',compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente= Cliente::findOrFail($id);
        return view('Cliente.edit',compact('cliente'));
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
        $updateCliente= Cliente::find($id);
        $updateCliente->nombre= $request->nombre;
        $updateCliente->fono= $request->fono;
        $updateCliente->domicilio= $request->domicilio;
        $updateCliente->depto= $request->depto;

        $updateCliente->save();
        return back()->with('mensaje','Datos de cliente actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyCliente= Cliente::find($id);
        $destroyCliente->delete();
        return back()->with('mensaje','Datos de cliente eliminado');
    }
}
