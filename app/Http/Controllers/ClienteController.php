<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Contenido;
use App\Producto;
use App\Pedido;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\NewClienteRequest;
use App\Http\Requests\DeleteClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use Illuminate\Support\Facades\DB;

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
        $clientes= Cliente::orderBy('nombre')->paginate(15);
        return view('Cliente.lista',compact('clientes'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('Cliente.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NewClienteRequest $request)
    {
        try{

            Cliente::create([
                'nombre' => $request->nombre,
                'fono' => $request->fono,
                'domicilio' => $request->domicilio,
                'depto' => $request->depto,
            ]);

            return back()->with('mensaje','Cliente añadido');
        }catch(Exception $e){
            Log::error('Error al guardar cliente');
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());

            return back()->with('error', 'Hubo un error al registrar cliente. Intente nuevamente.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateClienteRequest $request, $id)
    {
        try{
            Cliente::find($id)->update([
                'nombre' => $request->nombre,
                'fono' => $request->fono,
                'domicilio' => $request->domicilio,
                'depto' => $request->depto,
            ]);

            return back()->with('mensaje','Datos de cliente actualizado.');
        }catch(Exception $e){
            Log::error('Error al actualizar datos de cliente');
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());

            return back()->with('error', 'Ocurrio un error al actualizar datos del cliente. Intente nuevamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)   //elimina todo lo asociado al cliente (datos de cliente, pedidos y su respectivo contenido).
    {
        try{
            DB::beginTransaction();

            $destroyCliente= Cliente::find($id);
            $pedidos= Pedido::where('clienteId','=',$id)->get();
            foreach($pedidos as $pedido)
            {
                $contenidos= Contenido::where('pedidoId','=',$pedido->id)->get();
                foreach($contenidos as $contenido)
                {
                    $contenido->delete();  //Borra el contenido de los pedidos
                }
            }
            foreach($pedidos as $pedido)
            {
                $pedido->delete();   //Borra los pedidos
            }

            $destroyCliente->delete();  //Borra el cliente

            DB::commit();

            return redirect()->route('listaclientes')->with('mensaje','cliente eliminado.');
        }catch(Exception $e){
            DB::rollBack();

            Log::error('Ocurrio un error al eliminar el cliente y sus registros.');
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());

            return back()->with('error', 'Ocurrió un error al eliminar el cliente y sus registros. Intente nuevamente.');
        }
    }

}
