<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Stock;
use App\Categoria;
use App\Medida;
use App\Http\Requests\ProductoRequest;



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
        $productos= Producto::orderBy('nombre')->paginate(18);
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
    public function store(ProductoRequest $request)
    {
        $stock = Stock::create([
            'cantidad' => $request->cantidad,
        ]);

        Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'medidaId' => $request->medidaId,
            'categoriaId' => $request->categoriaId,
            'stockId' => $stock->id,
            'costo' => $request->costo,
            'ganancia' => $request->precio - $request->costo
        ]);

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
        $producto= Producto::find($id);
        $stock= Stock::where('id','=',$producto->stockId);
        $medida= Medida::where('id','=',$producto->medidaId)->get();
        return view('Producto.detalles',compact('producto','stock','medida'));
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
        $categorias= Categoria::all();
        $unidadMedida= Medida::all();

        return view('Producto.edit',compact('producto','categorias','unidadMedida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, $id)
    {
        $updateProducto= Producto::find($id)->update([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'medidaId' => $request->medidaId,
            'categoriaId' => $request->categoriaId,
            'costo' => $request->costo,
            'ganancia' => $request->precio - $request->costo,
        ]);

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
        try{

            $destroyProducto = Producto::find($id);
            $destroyProducto->delete();
            return redirect()->route('listaprod')->with('mensaje','Producto eliminado.');
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('error','no se puede eliminar el producto si está asociado a un pedido.');
        }
    }

}
