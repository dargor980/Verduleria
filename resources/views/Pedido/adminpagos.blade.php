@extends('plantilla')

@section('titulo', 'Administrar Pagos')

@section('contenido')
<br>
<div class="container">

<div class="card card5">
    <h1 class="text-center text-white my-4">Pagos Pendientes</h1>
    <div class="container table-responsive">
      @if (session('mensaje'))
        <div class="container my-3">
            <div class="alert alert-success">
                {{session('mensaje')}}
            </div>
        </div>           
      @endif
    <table class="table table-sm">
        <thead>
          <tr class="boton text-white">
            <th scope="col pl-2">N°</th>
            <th scope="col">Medio de pago</th>
            <th scope="col">Cliente</th>
            <th scope="col">Fecha</th>
            <th scope="col">Total</th>
            <th scope="col">Opción</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pendientes as $item)
          <tr>
            <td class="pt-2 pl-2">{{$item->id}}</td> {{-- N° DE PEDIDO --}}
            @if($item->metodopago==2)<td class="pt-2">Transferencia</td>@endif
            <td class="pt-2"><a href="{{route('detallepedido',$item->id)}}">{{$item->nombre}}</a></td>
            <td class="pt-2">{{$item->created_at}}</td>
            <td class="pt-2">${{$item->total}}</td>
            <td>
            <span><a href="{{route('marcarpagado',$item->id)}}"><i class="btn btn-success"> Marcar Pagado</a></i></span>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
       {{$pendientes->links()}} 
    </div>
</div>
@endsection