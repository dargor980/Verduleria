@extends('plantilla')

@section('titulo', 'Cliente')

@section('contenido')
<br><br><br><br><br><br>
<div class="container">
    <div class="modal-content my-2">
        <br>
        <div>
            <div class="text-right mr-5">
                <span><a href="{{route('editcliente',$cliente->id)}}" ><i class="fas fa-edit text-success btn btn-light"></a></i></span>
                <span><a href="{{route('deletecliente',$cliente->id)}}" ><i class="fas fa-trash-alt text-danger btn btn-light"></a></i></span>
            </div>
            <h2 class="my-2 text-white text-center">{{$cliente->nombre}}</h2>
        </div>
        <h3 class="text-white text-center col-md-6 my-2">Datos del cliente:</h3>
        <div class="row mb-4 mt-2">
            <div class="col-md-2"></div>
                <div class="col-md-8 card card6">
                    <div class="row mt-4">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <h5 class="text-white">Fono:</h5>
                        </div>
                        <div class="col-md-7">
                            <h5 class="card card1 text-center">{{$cliente->fono}}</h5>
                        </div>
                        <div class="col-md-1"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <h5 class="text-white">Domicilio:</h5>
                        </div>
                        <div class="col-md-7">
                            <h5 class="card card1 text-center">{{$cliente->domicilio}}</h5>
                        </div>
                        <div class="col-md-1"></div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <h5 class="text-white">Depto:</h5>
                        </div>
                        <div class="col-md-7">
                            <h5 class="card card1 text-center">&nbsp;{{$cliente->depto}}</h5>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            <div class="col-md-2"></div>
        </div>
        <div class="text-center mb-2">
            <a href="{{route('listaclientes')}}"><button class="btn btn-success mb-3 text-white"><i class="fas fa-arrow-left text-white"></i> Volver al listado</button></a>
        </div>
    </div>
</div>
@endsection