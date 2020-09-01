<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Producto;
use App\Proveedor;
use App\Cliente;
use App\Contenido;


class EstadisticasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function masVendidos()
    {
        
    }

    public function clientesFrecuentes()
    {

    }

    public function historialVentas()
    {
        
    }
}
