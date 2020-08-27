@extends('plantilla')

@section('titulo', 'Productos')

@section('contenido')

<div class="container">

<div class="card table-responsive">
    <h1 class="text-center text-white my-4">Lista de Productos</h1>
    <div class="container">
    <table class="table table-sm table-hover">
        <thead>
          <tr class="boton text-white">
            <th scope="col">N°</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Medida</th>
            <th scope="col">Opción</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Tomate</td>
            <td>1200</td>
            <td>Kg</td>
            <td>
                <span><a href="" ><i class="fas fa-edit text-success">&nbsp;</a></i></span>
                <span><a href="" ><i class="fas fa-trash-alt text-danger"></a></i></span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    </div>
</div>
@endsection