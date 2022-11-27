<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Pedido;
use App\Contenido;
use App\Cliente;
use App\Producto;
use App\Medida;
use App\Stock;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\NewClienteRequest;
use App\Http\Requests\NewPedidoRequest;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;
use Exception;
use Illuminate\Support\Facades\Log;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index']]);
    }
    public function index()
    {
        return view('Pedido.lista');
    }

    /**
     * @throws \Exception
     */
    public function indexPedidos(){
        $pedidos = Pedido::with('cliente')->select('*')->orderBy('id', 'DESC');

        return DataTables::of($pedidos)
            ->addColumn('link', function($pedido){

                return '<a href="/pedido/detalle/'. $pedido->id . '">'.$pedido->cliente[0]->nombre.'</a>';
            })
            ->editColumn('created_at', function ($pedido){
                return $pedido->created_at->format('Y-m-d');
            })
            ->rawColumns(['link'])
            ->make(true);
    }

    /**
     * @return Cliente[]|\Illuminate\Database\Eloquent\Collection
     */
    public function indexClientesPedidos(){
        return Cliente::all();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function indexProductos()
    {
        $productos= DB::table('productos')
                    ->join('stocks','stockId','stocks.id')
                    ->where('stocks.cantidad','>',0)
                    ->orderBy('productos.nombre','ASC')
                    ->get();
        return $productos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('Pedido.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewPedidoRequest $request
     * @return Pedido|\Illuminate\Database\Eloquent\Model
     */
    public function store(NewPedidoRequest $request)
    {
        try{
            $metodoPago = [
                '1' => 1,
                '2' => 0,
                '3' => 1,
            ];

            $pedido = Pedido::create([
                'clienteId' => $request->clienteId,
                'total' => $request->total,
                'estado' => $metodoPago[$request->metodopago],
                'metodopago' => $request->metodopago,
            ]);

            return $pedido;
        }catch(Exception $e){
            Log::channel('pedidos')->error('Error al guardar pedido: ');
            Log::channel('pedidos')->error($e->getMessage());
            Log::channel('pedidos')->error($e->getTraceAsString());
        }

    }

    /**
     * @param Request $request
     * @return void
     */
    public function addProductoToPedido(Request $request)
    {
        try{
            foreach($request->all() as $req)
            {
                $producto= Producto::find($req['productoId']);
                if(!isset($req['cantidad'])) {
                    $req['cantidad']=0;
                }

                Contenido::create([
                    'pedidoId' => $req['pedidoId'],
                    'productoId' =>$req['productoId'],
                    'cantidad' => $req['cantidad'],
                    'subtotal' => $req['cantidad']*$producto->precio,
                ]);
            }

            return;
        }catch(Exception $e){
            Log::channel('pedidos')->error('Error al agregar producto al pedido: ');
            Log::channel('pedidos')->error($e->getMessage());
            Log::channel('pedidos')->error($e->getTraceAsString());

            return;
        }


    }

    /**
     * @param Request $request
     * @return void
     */
    public function updateStock(Request $request)
    {
        try{
            foreach($request->all() as $req)
            {
                $producto=Producto::find($req['productoId']);
                $id=$producto->stockId;
                $stock= Stock::where('id','=',$id)->get();
                foreach($stock as $val)
                {
                    $val->cantidad= $val->cantidad - $req['cantidad'];
                    $val->update();
                }
            }
            return;
        }catch(Exception $e){
            Log::channel('pedidos')->error('Error al actualizar stock: ');
            Log::channel('pedidos')->error($e->getMessage());
            Log::channel('pedidos')->error($e->getTraceAsString());

            return;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        return view('Pedido.detalles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            $contenido= Contenido::where('pedidoId','=',$id)->get();

            foreach($contenido as $item)
            {
                $item->delete();
            }

            $pedido= Pedido::find($id);
            $pedido->delete();

            DB::commit();

            return back()->with('mensaje','Pedido eliminado');

        }catch(Exception $e){
            DB::rollBack();

            Log::channel('pedidos')->error('Error al eliminar pedido: ');
            Log::channel('pedidos')->error($e->getMessage());
            Log::channel('pedidos')->error($e->getTraceAsString());

            return back()->with('error', 'Ocurrió un error al eliminar el pedido. Intente nuevamente.');
        }

    }

    /**
     * @param NewClienteRequest $request
     * @return Cliente|\Illuminate\Database\Eloquent\Model
     */
    public function addCliente(NewClienteRequest $request)
    {
        try{
            $cliente = Cliente::create([
                'nombre' => $request->nombre,
                'fono' => $request->fono,
                'domicilio' => $request->domicilio,
                'depto' => $request->depto,
            ]);

            return $cliente;
        }catch(Exception $e){
            Log::channel('pedidos')->error('Error al crear cliente: ');
            Log::channel('pedidos')->error($e->getMessage());
            Log::channel('pedidos')->error($e->getTraceAsString());

            return;
        }

    }

    /**
     * @param Request $request
     * @return Cliente|Cliente[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function SearchClienteById(Request $request)
    {
        return Cliente::find($request->id);
    }

    /**
     * @param $id
     * @return Response
     */
    public function reporteClientePdf($id)
    {
        try{
            $productos = Contenido::with(['producto', 'pedido'])
                ->where('pedidoId', '=', $id)
                ->get();

            $pedido = Pedido::with('cliente')
                ->where('id', '=', $id)
                ->first();

            $medidas= Medida::all();

            $reporte= \PDF::loadView('Pedido.reporte', compact('productos','pedido','medidas'));

            return $reporte->download('pedido'.$id.'.pdf');

        }catch(Exception $e){
            Log::channel('pedidos')->error('Error al generar pdf de pedido: ');
            Log::channel('pedidos')->error($e->getMessage());
            Log::channel('pedidos')->error($e->getTraceAsString());

            return back()->with('error', 'Ocurrió un error al descargar el pdf. Intente nuevamente.');
        }

    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function reporteClienteVista($id)
    {
        try{
            $productos = Contenido::with(['producto', 'pedido'])
                ->where('pedidoId', '=', $id)
                ->get();

            $pedido = Pedido::with('cliente')
                ->where('id', '=', $id)
                ->first();

            $medidas= Medida::all();

            return view('Pedido.detalles', compact('productos','pedido','medidas'));

        }catch(Exception $e){
            Log::channel('pedidos')->error('Error al obtener datos de pedido: ');
            Log::channel('pedidos')->error($e->getMessage());
            Log::channel('pedidos')->error($e->getTraceAsString());

            return back()->with('error', 'Hubo un error al mostrar el pedido. Intente nuevamente.');
        }

    }

    /**
     * @return Medida[]|\Illuminate\Database\Eloquent\Collection
     */
    public function indexMedidasProductos(){
        return Medida::all();
    }

    /**
     * @return Application|Factory|View
     */
    public function administrarPagos()
    {
        return view('Pedido.adminpagos');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getPagos(){
        try{
            $pendientes = Pedido::with('cliente')
                ->select('*')
                ->where('estado', '=', 0)
                ->where('metodopago', '=', 2)
                ->orderBy('id', 'DESC');

            return DataTables::of($pendientes)
                ->addColumn('link', function($pedido){

                    return '<a href="/pedido/detalle/'. $pedido->id . '">'.$pedido->cliente[0]->nombre.'</a>';
                })
                ->editColumn('created_at', function ($pedido){
                    return $pedido->created_at->format('Y-m-d');
                })
                ->rawColumns(['link'])
                ->make(true);

        }catch(Exception $e){
            Log::channel('pedidos')->error('Datatables: Error al obtener pagos');
            Log::channel('pedidos')->error($e->getMessage());
            Log::channel('pedidos')->error($e->getTraceAsString());
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function marcarPagado($id)
    {
        try{
            Pedido::find($id)->update([
                'estado' => 1
            ]);
            return back()->with('mensaje','El pedido ya está pagado');

        }catch(Exception $e){
            Log::channel('pedidos')->error('Error al marcar pedido como pagado: ');
            Log::channel('pedidos')->error($e->getMessage());
            Log::channel('pedidos')->error($e->getTraceAsString());

            return back()->with('error', 'Hubo un error al marcar el pedido como pagado. Intente nuevamente.');
        }

    }
}
