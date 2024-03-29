<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\Http\Requests\NewProveedorRequest;
use App\Http\Requests\UpdateProveedorRequest;
use App\Http\Requests\DeleteProveedorRequest;
use Exception;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

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
        return view('Proveedores.lista');
    }

    /**
     * @throws Exception
     */
    public function getProveedores(){
        $proveedores = Proveedor::select('*');

        return DataTables::of($proveedores)
            ->make(true);
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
    public function store(NewProveedorRequest $request)
    {
        try{
            Proveedor::create([
                'rut' => $request->rut,
                'nombre' => $request->nombre,
                'empresa' => $request->fono,
                'fono' => $request->direccion,
                'direccion' => $request->direccion,
                'descripcion' => $request->descripcion,
            ]);

            return back()->with('mensaje','Proveedor añadido');

        }catch(Exception $e){
            Log::channel('proveedores')->error('Error al agregar proveedor');
            Log::channel('proveedores')-error($e->getMessage());
            Log::channel('proveedores')-error($e->getTraceAsString());
            return back()->with('error','Error al agregar proveedor. Intente nuevamente');
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
        $proveedor= Proveedor::find($id);
        return view('Proveedores.detalles',compact('proveedor'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('Proveedores.edit',compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProveedorRequest $request, $id)
    {
        try{
            Proveedor::find($id)
                ->update([
                    'fono' => $request->fono,
                    'direccion' => $request->direccion,
                    'descripcion' => $request->descripcion

                ]);

            return back()->with('mensaje','Proveedor actualizado');
        }catch(Exception $e){
            Log::channel('proveedores')-error('Error al actualizar proveedor');
            Log::channel('proveedores')-error($e->getMessage());
            Log::channel('proveedores')-error($e->getTraceAsString());

            return back()->with('error', 'Error al actualizar proveedor. Intente nuevamente');
        }
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
            $destroyProveedor= Proveedor::find($id);
            $destroyProveedor->delete();
            return redirect()->route('listaprov')->with('mensaje','Proveedor eliminado.');
        }catch(Exception $e){
            Log::channel('proveedores')->error('Error al eliminar proveedor: ');
            Log::channel('proveedores')->error($e->getMessage());
            Log::channel('proveedores')->error($e->getTraceAsString());
        }

    }
}
