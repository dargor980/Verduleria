@extends('plantilla')

@section('titulo', 'Clientes')

@section('contenido')

<div class="container">

<div class="card table-responsive">
    <h1 class="text-center text-white my-4">Lista de Clientes</h1>
    <div class="container">
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
          <tr>
            <td><a href="{{route('detallec',1)}}"> Braulio Argandoña Carrasco </a></td>
            <td>950161342</td>
            <td>Ester Hunneus 2045, Puente Alto</td>
            <td>mi depto</td>
            <td>
                <span><a href="{{route('editcliente',1)}}" ><i class="fas fa-edit text-success">&nbsp;</a></i></span>
                <span><a href="" ><i class="fas fa-trash-alt text-danger"></a></i></span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    </div>
</div>
@endsection