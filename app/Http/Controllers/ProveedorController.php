<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;

class ProveedorController extends Controller
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
        $proveedores= Proveedor::all();
        return view('Proveedores.lista',compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Proveedores.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'fono'   => 'required'
        ]);
        $proveedor= new Proveedor();
        $proveedor->rut= $request->rut;
        $proveedor->nombre= $request->nombre;
        $proveedor->empresa= $request->empresa;
        $proveedor->fono= $request->fono;
        $proveedor->direccion= $request->descripcion;
        $proveedor->descripcion= $request->descripcion;

        $proveedor->save();
        return back()->with('mensaje','Proveedor añadido');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor= Proveedor::find($id);
        return view('Proveedores.detalles');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor= Proveedor::findOrFail($id);
        return view('Proveedores.edit');
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
        $updateProveedor= Proveedor::find($id);
        $updateProveedor->fono= $request->fono;
        $updateProveedor->direccion= $request->direccion;
        $updateProveedor->descripcion= $request->descripcion;

        $updateProveedor->save();
        return back()->with('mensaje','Proveedor actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyProveedor= Proveedor::find($id);
        $destroyProveedor->delete();
        return back()->with('mensaje','Proveedor eliminado');
    }
}
