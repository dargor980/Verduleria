@extends('plantilla')

@section('titulo', 'Añadir Stock')

@section('contenido')
<br>

<div class="modal-dialog text-center">
    <div class="col-sm-12">
        <div class="modal-content my-2">
        <br>
        @if (session('mensaje'))
            <div class="container my-3">
                <div class="alert alert-success">
                    {{session('mensaje')}}
                </div>
            </div>           
        @endif
            <div>
                <h4 class="my-2 text-white">Stock de Producto</h4>
            </div>
            <form method="POST" class="col-12" enctype="multipart/form-data">
                @csrf
                <br>
                <select name='categoriaId' class="custom-select">
                    <option selected>Seleccione producto:</option>
                    <option value="1">Producto 1</option>
                </select>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-box-open"></i></span>
                    </div>
                    @error('stockId')
                         <div class="alert alert-danger"> El Stock es obligatorio </div>
                     @enderror
                    <input name='stockId' type="number" placeholder="Cantidad de Stock" class="form-control"> 
                </div>
                <br>
                <button class="btn btn-success mb-3 text-white" type="submit"><i class="fas fa-cash-register"></i> Enviar</button>
            </form>
            <hr>
            <h1>Stock Actual</h1>
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
</div>
@endsection