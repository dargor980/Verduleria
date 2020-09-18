@extends('plantilla')

@section('titulo', 'Pedidos')

@section('contenido')
<br>
<div class="container">

<div class="card card5">
    <h1 class="text-center text-white my-4">Lista de Pedidos</h1>
    <div class="container table-responsive">
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
            <th scope="col">N°</th>
            <th scope="col">Estado</th>
            <th scope="col">Pago</th>
            <th scope="col">Cliente</th>
            <th scope="col">Fecha</th>
            <th scope="col">Total</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pedidos as $pedido)
          <tr>
            <td class="pl-2">{{$pedido->id}}</td>
            <td>@if($pedido->estado==0) Pendiente @else Pagado @endif</td>
            @if($pedido->metodopago=='1')<td>Efectivo</td>@endif
            @if($pedido->metodopago=='2')<td>Transferencia</td>@endif
            @if($pedido->metodopago=='3')<td>Tarjeta</td>@endif
            <td><a href="{{route('detallepedido',$pedido->id)}}">@foreach($clientes as $cliente) @if($cliente->id==$pedido->clienteId){{$cliente->nombre}} @endif @endforeach</a></td>
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