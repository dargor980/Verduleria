@extends('plantilla')

@section('titulo', 'Proveedores')

@section('contenido')

<div class="container">

<div class="card table-responsive">
    <h1 class="text-center text-white my-4">Lista de Proveedores</h1>
    <div class="container">
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
          <tr>
            <th scope="row">1</th>
            <td>Proveedor 1</td>
            <td>Empresa 1</td>
            <td>77.959.554-7</td>
            <td>950161342</td>
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