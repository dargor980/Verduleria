@extends('plantilla')

@section('titulo', 'Nuevo Producto')

@section('contenido')
<br><br>
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
                <h4 class="my-2 text-white">Nuevo Producto</h4>
            </div>
            <form method="POST" class="col-12" enctype="multipart/form-data">
                @csrf
            <br>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                    </div>
                     @error('nombre')
                         <div class="alert alert-danger"> El Nombre es obligatorio </div>
                     @enderror
                    <input name='nombre' type="text" placeholder="Nombre del producto" class="form-control">
                </div>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                    </div>
                    @error('precio')
                         <div class="alert alert-danger"> El Precio es obligatorio </div>
                     @enderror
                    <input name='precio' type="number" placeholder="Precio" class="form-control"> 
                </div>

                <select name='medidaId' class="custom-select">
                    <option selected>Seleccione Unidad de Medida:</option>
                    <option value="1">Kg</option>
                    <option value="2">Unidad</option>
                    <option value="3">Paquete</option>
                    <option value="4">Docena</option>
                    <option value="5">Media Docena</option>
                    
                </select>
                <br><br><br>
                <button class="btn btn-success mb-3 text-white" type="submit"><i class="fas fa-paper-plane text-white"></i> Enviar</button>
            </form>
        </div>
    </div> 
</div>
@endsection