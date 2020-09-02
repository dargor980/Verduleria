@extends('plantilla')

@section('titulo', 'Editar Cliente')

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
                <h4 class="my-2 text-white">Editar Cliente</h4>
            </div>
        <form method="POST" action="{{route('updatecliente',$cliente->id)}}" class="col-12" enctype="multipart/form-data">
            @method('PUT')
                @csrf
               
                
            <br>
            @error('nombre')
                <span class="badge badge-danger float-right"> El Nombre es obligatorio </span>
            @enderror
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                    </div>
                    <input name='nombre' type="text" placeholder="Nombre" class="form-control" value="{{$cliente->nombre}}">
                  
                </div>
                 
                
                @error('fono')
                    <div class="badge badge-danger float-right"> El Teléfono es obligatorio </div>
                @enderror
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                    </div>
                    
                    <input name='fono' type="number" placeholder="Teléfono" class="form-control" value="{{$cliente->fono}}"> 
                </div>

                @error('domicilio')
                    <div class="badge badge-danger float-right"> El domicilio es obligatorio </div>
                @enderror
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                    </div>
                    
                    <input name='domicilio' type="text" placeholder="Direccion" class="form-control" value="{{$cliente->domicilio}}"> 
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                    </div>
                    <input name='depto' type="text" placeholder="Depto" class="form-control" value="{{$cliente->depto}}"> 
                </div>

                <br>
                <div class="row justify-content-center">
                    <button class="btn btn-success mb-3 text-white" type="submit"><i class="fas fa-save"></i> Guardar</button>
                    <a class="btn btn-success mb-3 text-white mx-2" href="{{route('listaclientes')}}"> <i class="fas fa-reply text-white"></i> Lista</a>
                    <a class="btn btn-success mb-3 text-white" href="{{route('detallec',$cliente->id)}}"> <i class="fas fa-reply text-white"></i> Cliente</a>
                </div>
            </form>
        </div>
    </div> 
</div>
@endsection