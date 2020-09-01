@extends('plantilla')

@section('titulo', 'Proveedores')

@section('contenido')
<br>
<div class="container">

<div class="card table-responsive">
    <h1 class="text-center text-white my-4">Lista de Proveedores</h1>
    <div class="container">
      @if (session('mensaje'))
        <div class="container my-3">
            <div class="alert alert-success">
                <span><i class="fas fa-check"></i></span>{{session('mensaje')}}
            </div>
        </div>           
    @endif
    <table class="table table-sm table-hover">
        <thead>
          <tr class="boton text-white">
            <th scope="col">N°</th>
            <th scope="col">Nombre</th>
            <th scope="col">Empresa</th>
            <th scope="col">Rut</th>
            <th scope="col">Fono</th>
            <th scope="col">Opción</th>
          </tr>
        </thead>
        <tbody>
          @foreach($proveedores as $item)
          <tr>
            <th scope="row">{{$item->id}}</th>
            <td><a href="{{route('detalleprov',$item->id)}}"> {{$item->nombre}} </a></td>
            <td>{{$item->empresa}}</td>
            <td>{{$item->rut}}</td>
            <td>{{$item->fono}}</td>
            <td>
                <span><a href="{{route('editprov',$item->id)}}" ><i class="fas fa-edit text-success">&nbsp;</a></i></span>
                <span><a href="{{route('deleteprov',$item->id)}}" ><i class="fas fa-trash-alt text-danger"></a></i></span>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>

      {{$proveedores->links()}}
    </div>
    </div>
</div>
@endsection