@extends('plantilla')

@section('titulo', 'Nueva Categoria')

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
                <h4 class="my-2 text-white">Nueva Categoria</h4>
            </div>
            <form method="POST" class="col-12" enctype="multipart/form-data">
                @csrf
            <br>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                    </div>
                     @error('nombre')
                         <div class="alert alert-danger"> El Nombre de la categoria es obligatoria </div>
                     @enderror
                    <input name='nombre' type="text" placeholder="Categoria" class="form-control">
                </div>
                <br>
                <button class="btn btn-success mb-3 text-white" type="submit"><i class="fas fa-plus"></i> Añadir</button>
            </form>
        </div>
    </div> 
</div>

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
                <h4 class="my-2 text-white">Eliminar Categoria</h4>
            </div>
            <form method="POST" class="col-12" enctype="multipart/form-data">
                @csrf
            <br>
            <select name='categoriaId' class="custom-select">
                <option selected>Seleccione una categoria:</option>
                <option value="1">Categoria 1</option>
            </select>
            <br>
                <br>
                <button class="btn btn-danger mb-3 text-white" type="submit"><i class="fas fa-trash-alt"></i> Eliminar</button>
            </form>
        </div>
    </div> 
</div>
@endsection