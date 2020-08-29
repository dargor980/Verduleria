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
        <div class="row my-3 mb-5">
            <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h4 class="text-white">Datos del cliente:</h4>
                    <div class="card card1 my-2"><h5>&nbsp; Fono: {{$cliente->fono}}</h5></div>
                    <div class="card card1 my-2"><h5>&nbsp; Domicilio: {{$cliente->domicilio}}</h5></div>
                    <div class="card card1 my-2"><h5>&nbsp; Depto: {{$cliente->depto}}</h5></div>
                </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
@endsection