@extends('plantilla')

@section('titulo', 'Nuevo Proveedor')

@section('contenido')

<div class="modal-dialog text-center">
    <div class="col-sm-12">
        <div class="modal-content my-2">
        <br>
        @if (session('mensaje'))
            <div class="container my-3">
                <div class="alert alert-success">
                    <span><i class="fas fa-check"></i></span>&nbsp;{{session('mensaje')}}
                </div>
            </div>           
        @endif
            <div>
                <h4 class="my-2 text-white">Nuevo Proveedor</h4>
            </div>
            <form method="POST" action="{{route('addprov')}}"class="col-12" enctype="multipart/form-data">
                @csrf
            <br>
                @error('nombre')
                    <div class="badge badge-danger float-right"> *El Nombre es obligatorio </div>
                @enderror
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                    </div>
                    <input name='nombre' type="text" placeholder="Nombre del proveedor" class="form-control">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                    </div>
                    <input name='empresa' type="text" placeholder="Empresa" class="form-control">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                    </div>
                    <input name='rut' type="text" placeholder="Rut de Empresa" class="form-control">
                </div>

                @error('fono')
                    <div class="badge badge-danger float-right"> *El Teléfono es obligatorio </div>
                @enderror
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                    </div>
                    <input name='fono' type="number" min="0" placeholder="Teléfono" class="form-control"> 
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                    </div>
                    <input name='direccion' type="text" placeholder="Direccion" class="form-control"> 
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                        
                    </div>
                    <textarea name='descripcion' id=""  placeholder="Descripcion" class="form-control"></textarea>
                </div>
                <br>
                <button class="btn btn-success mb-3 text-white" type="submit"><i class="fas fa-paper-plane text-white"></i> Enviar</button>
            </form>
        </div>
    </div> 
</div>
@endsection