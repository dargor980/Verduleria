@extends('plantilla')

@section('titulo', 'Clientes')

@section('contenido')

<div class="container">
@php $id;@endphp
<div class="card card5">
    <h1 class="text-center text-white mt-4">Lista de Clientes</h1>
    <div class="container">
      @if (session('mensaje'))
        <div class="container my-3">
            <div class="alert alert-success">
                {{session('mensaje')}}
            </div>
        </div>
      @endif
    <table class="table table-sm table-hover" id="clientes">
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


        </tbody>
      </table>

    </div>
    </div>
</div>

    <!--Confirmación eliminación cliente-->
    <div class="modal fade" id="" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-white" id="">Eliminar cliente</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-white">
              <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;Advertencia</strong>: <br><br> Al eliminar el cliente, se eliminarán también todos los datos asociados (incluyendo los pedidos). <br><br> <strong>¿Desea continuar?</strong>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <a href="" id="link" ><button type="button" class="btn btn-success"><i class="fas fa-trash text-white"></i> Eliminar</button></a>
          </div>
        </div>
      </div>
    </div>
    <!--Confirmación eliminación cliente-->

@endsection
