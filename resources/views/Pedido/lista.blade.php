@extends('plantilla')

@section('titulo', 'Clientes')

@section('contenido')
<br>
<div class="container">

<div class="card card5 table-responsive">
    <h1 class="text-center text-white my-4">Últimos Pedidos</h1>
    <div class="container">
      @if (session('mensaje'))
        <div class="container my-3">
            <div class="alert alert-success">
                {{session('mensaje')}}
            </div>
        </div>           
      @endif
    <table class="table table-sm table-hover">
        <thead>
          <tr class="boton text-white">
            <th scope="col">Cliente</th>
            <th scope="col">Fecha</th>
            <th scope="col">Total</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><a href="{{route('detallepedido')}}">Nombre</a></td>
            <td>01/09/2020</td>
            <td>$20990</td>
            <td>
                <span><a href="#" ><i class="fas fa-trash-alt text-danger"></a></i></span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
</div>
@endsection