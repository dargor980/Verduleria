@extends('plantilla')

@section('titulo', 'Nuevo Pedido')

@section('contenido')
<br><br>
<div class="pdf container">
    <div class="container">
        <h1 class="text-center text-white">Nuevo Pedido</h1>
        <div id="app">
            <pedido></pedido>
        </div>
    </div>
</div>
<br><br>
@endsection
