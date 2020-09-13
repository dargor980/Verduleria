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
            <th scope="col">Cliente</th>
            <th scope="col">Fecha</th>
            <th scope="col">Total</th>
            <th scope="col">Opción</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="pt-2 pl-2">13</td> {{-- N° DE PEDIDO --}}
            <td class="pt-2"><a>Nombre Cliente</a></td>
            <td class="pt-2">Fecha</td>
            <td class="pt-2">Total</td>
            <td>
                <span><a><i class="btn btn-success"> Marcar Pagado</a></i></span>
            </td>
          </tr>
        </tbody>
      </table>
      {{-- {{$pedidos->links()}} --}}
    </div>
</div>
@endsection