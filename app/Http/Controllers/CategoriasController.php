<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Sucursal;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias= Categoria::all();
        return view('Producto.categoriaview');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sucursales= Sucursal::all();
        $categorias= Categoria::all();
        return view('Producto.categorianew',compact('sucursales','categorias'));
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
            'tipo' => 'required',
            'sucursalId' => 'required'
        ]);
        $categoria= new Categoria();
        $categoria->tipo= $request->tipo;
        $categoria->sucursalId= $request->sucursalId;
        $categoria->save();

        return back()->with('mensaje','Categoría añadida');

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
    public function destroy(Request $request)
    {
        try{

            $request->validate([
                'categoriaId' => 'required|not_in:0'
            ]);
            $destroyCategoria= Categoria::find($request->categoriaId);
            $destroyCategoria->delete();
    
            return back()->with('mensaje2','Categoría eliminada');
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('error','esta categoría posee productos. Si desea eliminarla, primero elimine los productos asociados a ella.');

        }
    }
}
