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
        <form method="POST" action="{{route('addcliente')}}" class="col-12" enctype="multipart/form-data">
                @csrf
            <br>
            @error('nombre')
                <span class="badge badge-danger float-right"> El Nombre es obligatorio </span>
            @enderror
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                    </div>
                    <input name='nombre' type="text" placeholder="Nombre" class="form-control">
                  
                </div>
                 
                
                @error('fono')
                    <div class="badge badge-danger float-right"> El Teléfono es obligatorio </div>
                @enderror
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                    </div>
                    
                    <input name='fono' type="number" placeholder="Teléfono" class="form-control"> 
                </div>

                @error('domicilio')
                    <div class="badge badge-danger float-right"> El domicilio es obligatorio </div>
                @enderror
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                    </div>
                    
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