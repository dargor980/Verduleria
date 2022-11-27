<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Sucursal;
use App\Http\Requests\NewCategoriaRequest;
use Illuminate\Support\Facades\Log;
use Exception;

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
    public function store(NewCategoriaRequest $request)
    {
        try{
            Categoria::create([
                'tipo' => $request->tipo,
                'sucursalId' => $request->sucursalId,
            ]);

            return back()->with('mensaje','Categoría añadida');

        }catch (Exception $e){
            Log::channel('categorias')->error('Error al crear categoria');
            Log::channel('categorias')->error($e->getMessage());
            Log::channel('categorias')->error($e->getTraceAsString());

            return back()->with('error', 'Hubo un error al crear la categoria. Intente nuevamente.');
        }

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
            $destroyCategoria= Categoria::find($request->categoriaId);
            $destroyCategoria->delete();

            return back()->with('mensaje2','Categoría eliminada');
        }
        catch(\Illuminate\Database\QueryException $ex){
            Log::channel('categorias')->error('Error al eliminar categoría');
            Log::channel('categorias')->error($ex->getMessage());
            Log::channel('categorias')->error($ex->getTraceAsString());
            return back()->with('error','esta categoría posee productos. Si desea eliminarla, primero elimine los productos asociados a ella.');

        }
    }
}
