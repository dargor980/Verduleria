<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Stock;
use App\Categoria;
use App\Medida;



class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth', ['except' =>['index']]);
    }
    public function index()
    {
        $productos= Producto::paginate(10);
        $categorias= Categoria::all();
        $medidas= Medida::all();
        return view('Producto.lista',compact('productos','categorias','medidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias= Categoria::all();
        $unidadMedida= Medida::all();
        return view('Producto.new',compact('categorias','unidadMedida'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([                  //Validación de los campos del formulario
            'nombre' => 'required',
            'precio' => 'required',
            'medidaId' => 'required',
            'categoriaId' => 'required',
            'cantidad' => 'required'
        ]);
        
        $stock= new Stock();
        $stock->cantidad = $request->cantidad;
        $stock->save();

        $producto= new Producto();
        $producto->nombre= $request->nombre;
        $producto->precio= $request->precio;
        $producto->medidaId= $request->medidaId;
        $producto->categoriaId= $request->categoriaId;
        $producto->stockId= $stock->id;

        $producto->save();
        return back()->with('mensaje','Producto agregado.');
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
        $producto= Producto::findOrFail($id);

        return view('Producto.edit',compact('producto'));
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
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'medidaId' => 'required'
        ]);
        $updateProducto= Producto::find($id);
        $updateProducto->nombre= $request->nombre;
        $updateProducto->precio= $request->precio;
        $updateProducto->medidaId= $request->medidaId;
        $updateProducto->save();

        return back()->with('mensaje','Producto actualizado. ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyProducto= Producto::find($id);
        $destroyProducto->delete();
        return back()->with('mensaje','Producto eliminado.');
    }
}
