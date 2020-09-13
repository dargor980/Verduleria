@extends('plantilla')

@section('titulo', 'Clientes')

@section('contenido')

<div class="container">
@php $id;@endphp
<div class="card card5">
    <h1 class="text-center text-white mt-4">Lista de Clientes</h1>
    <form action="{{route('searchcliente')}}">
      @method('POST')
      @csrf
      <div class="row">
        <h3 class="text-white pl-4 ml-2 my-3">Buscar Cliente:</h3>
        <div class="input-group md-form form-sm form-2 pl-2 my-3" style="width: 400px;">
          <input class="form-control my-0 py-1 lime-border" type="text" placeholder="Buscar" aria-label="Search">
          <div class="input-group-append">
            <button class="btn input-group-text lime lighten-2" id="basic-text1" type="submit"><i class="fas fa-search text-grey"aria-hidden="true"></i></button>
          </div>
        </div>
      </div>
    </form>
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
            <span><button class="btn btn-sm botona" data-toggle="modal" data-target="#id{{$item->id}}"><i class="fas fa-trash-alt text-danger"></i></button></span>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$clientes->links()}}
    </div>
    </div>    
</div>
    @foreach($clientes as $item)
    <!--Confirmación eliminación cliente-->
    <div class="modal fade" id="id{{$item->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="{{$item->nombre}}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-white" id="{{$item->nombre}}">Eliminar cliente</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-white">
              <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;Advertencia</strong>: <br><br> Al eliminar el cliente, se eliminarán también todos los datos asociados (incluyendo los pedidos). <br><br> <strong>¿Desea continuar?</strong> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            <a href="{{route('deletecliente',$item->id)}}" id="link" ><button type="button" class="btn btn-success"><i class="fas fa-trash text-white"></i> Eliminar</button></a>
          </div>
        </div>
      </div>
    </div>
    <!--Confirmación eliminación cliente-->
   @endforeach
@endsection