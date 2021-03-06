@extends('plantilla')

@section('titulo', 'Resultados de búsqueda')

@section('contenido')

<div class="container">
    @php $id;@endphp
    <div class="card card5">
        <h1 class="text-center text-white mt-4">Lista de Clientes</h1>
        <h3 class="text-white pl-4 ml-2 my-3">Resultado: {{$search}}</h3>
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
              @foreach($cliente as $item)
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
          {{$cliente->links()}}
        </div>
        </div>    
    </div>
        @foreach($cliente as $item)
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <a href="{{route('deletecliente',$item->id)}}" id="link" ><button type="button" class="btn btn-success"><i class="fas fa-trash text-white"></i> Eliminar</button></a>
              </div>
            </div>
          </div>
        </div>
        <!--Confirmación eliminación cliente-->
       @endforeach
    @endsection