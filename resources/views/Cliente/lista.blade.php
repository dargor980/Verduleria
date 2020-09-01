@extends('plantilla')

@section('titulo', 'Clientes')

@section('contenido')

<div class="container">

<div class="card table-responsive">
    <h1 class="text-center text-white my-4">Lista de Clientes</h1>
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
            <th scope="col">Nombre</th>
            <th scope="col">Fono</th>
            <th scope="col">Domicilio</th>
            <th scope="col">Depto</th>
            <th scope="col">Opción</th>
          </tr>
        </thead>
        <tbody>
          @foreach($clientes as $item)
          <tr>
            <td><a href="{{route('detallec',$item->id)}}"> {{$item->nombre}} </a></td>
            <td>{{$item->fono}}</td>
            <td>{{$item->domicilio}}</td>
            <td>{{$item->depto}}</td>
            <td>
                <span><a href="{{route('editcliente',$item->id)}}" ><i class="fas fa-edit text-success">&nbsp;</a></i></span>
              <span><a href="{{route('deletecliente',$item->id)}}" ><i class="fas fa-trash-alt text-danger"></a></i></span>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
      {{$clientes->links()}}
    </div>
    </div>
</div>
@endsection