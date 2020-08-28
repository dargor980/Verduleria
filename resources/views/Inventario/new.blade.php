@extends('plantilla')

@section('titulo', 'Añadir Stock')

@section('contenido')
<br>

<div class="container text-center">
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
            <h2 class="my-2 text-white">Stock de Producto</h2>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <form method="POST" class="col-12" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <select name='categoriaId' class="custom-select my-3">
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
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="modal-content my-2 table-responsive">
        <h2 class="text-white my-2">Stock Actual</h2>
        <div class="container mt-2">
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