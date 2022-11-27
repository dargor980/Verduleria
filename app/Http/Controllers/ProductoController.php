<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Stock;
use App\Categoria;
use App\Medida;
use App\Http\Requests\ProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use Exception;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;



class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
            return view('Producto.lista');
    }

    /**
     * @throws Exception
     */
    public function getProducts(){
        $productos = Producto::with(['categoria', 'medida'])->select(['*']);

        return DataTables::of($productos)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
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
     * @param ProductoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductoRequest $request)
    {
        DB::beginTransaction();

        try{
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

            DB::commit();

            return back()->with('mensaje','Producto agregado.');
        }catch(Exception $e){
            DB::rollBack();

            Log::channel('productos')->error('Error al crear producto: ');
            Log::channel('productos')->error($e->getMessage());
            Log::channel('productos')->error($e->getTraceAsString());

            return back()->with('error', 'Hubo un error al crear el producto. Intente nuevamente.');
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
        $producto = Producto::with('medida')->find($id);

        return view('Producto.detalles', ['producto' => $producto]);
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
     * @param UpdateProductoRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProductoRequest $request, $id)
    {
        try{
            $updateProducto= Producto::find($id)->update([
                'nombre' => $request->nombre,
                'precio' => $request->precio,
                'medidaId' => $request->medidaId,
                'categoriaId' => $request->categoriaId,
                'costo' => $request->costo,
                'ganancia' => $request->precio - $request->costo,
            ]);

            return back()->with('mensaje','Producto actualizado. ');

        }catch(Exception $e){
            Log::channel('productos')->error('Error al actualizar el producto');
            Log::channel('productos')->error($e->getMessage());
            Log::channel('productos')->error($e->getTraceAsString());

            return back()->with('error', 'Hubo un error al actualizar el producto. Intente nuevamente.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try{
            $destroyProducto = Producto::find($id);
            $destroyProducto->delete();
            return redirect()->route('listaprod')->with('mensaje','Producto eliminado.');
        }
        catch(\Illuminate\Database\QueryException $ex){
            Log::channel('productos')->error('Error al eliminar producto: ');
            Log::channel('productos')->error($ex->getMessage());
            Log::channel('productos')->error($ex->getTraceAsString());

            return back()->with('error','no se puede eliminar el producto si está asociado a un pedido.');
        }
    }

}
