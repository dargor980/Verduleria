@extends('plantilla')

@section('titulo', 'Stock')

@section('contenido')

<div class="container">
  <div class="card table-responsive">
      <h1 class="text-center text-white my-4">Stock de Productos: Verduleria</h1>
    <div class="container">
      <table class="table table-sm table-hover">
        <thead>
            <tr class="boton text-white">
              <th scope="col">Nombre</th>
              <th scope="col">Precio</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Medida</th>
              <th scope="col">Categoria</th>
              <th scope="col">Opción</th>
            </tr>
        </thead>
        <tbody>
          <tr>
            <td>Lechugas</td>
            <td>600</td>
            <td>20</td>
            <td>Unidades</td>
            <td>Hortalizas</td>
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