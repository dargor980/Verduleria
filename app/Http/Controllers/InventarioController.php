<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('Inventario.new');
    }

    public function showverduleria()
    {
        return view('Inventario.listaverduleria');
    }

    public function showcongelados()
    {
        return view('Inventario.listacongelados');
    }
}
