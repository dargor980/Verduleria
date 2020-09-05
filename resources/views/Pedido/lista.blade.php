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
          @foreach($pedidos as $pedido)
          <tr>
            <td><a href="{{route('detallepedido')}}">@foreach($clientes as $cliente) @if($cliente->id==$pedido->clienteId){{$cliente->nombre}} @endif @endforeach</a></td>
            <td>{{$pedido->created_at}}</td>
            <td>${{$pedido->total}}</td>
            <td>
                <span><a href="{{route('deletepedido',$pedido->id)}}" ><i class="fas fa-trash-alt text-danger"></a></i></span>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$pedidos->links()}}
    </div>
</div>
@endsection