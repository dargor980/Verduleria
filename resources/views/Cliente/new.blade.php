@extends('plantilla')

@section('titulo', 'Nuevo Cliente')

@section('contenido')

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
                <h4 class="my-2 text-white">Nuevo Cliente</h4>
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
                    <input name='nombre' type="text" placeholder="Nombre" class="form-control">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                    </div>
                    @error('fono')
                         <div class="alert alert-danger"> El Teléfono es obligatorio </div>
                     @enderror
                    <input name='fono' type="number" placeholder="Teléfono" class="form-control"> 
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                    </div>
                    @error('domicilio')
                         <div class="alert alert-danger"> El domicilio es obligatorio </div>
                     @enderror
                    <input name='domicilio' type="text" placeholder="Direccion" class="form-control"> 
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                    </div>
                    <input name='depto' type="text" placeholder="Depto" class="form-control"> 
                </div>

                <br>
                <button class="btn btn-success mb-3 text-white" type="submit"><i class="fas fa-paper-plane text-white"></i> Enviar</button>
            </form>
        </div>
    </div> 
</div>
@endsection