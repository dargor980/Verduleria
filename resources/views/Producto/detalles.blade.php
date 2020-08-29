@extends('plantilla')

@section('titulo', 'Productos')

@section('contenido')
<br><br><br><br><br><br>
<div class="container">
    <div class="modal-content my-2">
        <br>
        <div>
            <div class="text-right mr-5">
                <span><a href="{{route('editprod',$producto->id)}}" ><i class="fas fa-edit text-success btn btn-light"></a></i></span>
                <span><a href="{{route('deleteprod',$producto->id)}}" ><i class="fas fa-trash-alt text-danger btn btn-light"></a></i></span>
            </div>
            <h2 class="my-2 text-white text-center">{{$producto->nombre}}</h2>
        </div>
        <div class="row my-3 mb-5">
            <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h4 class="text-white">Datos del producto:</h4>
                    <div class="card card1 my-2"><h5>&nbsp; Precio: {{$producto->precio}}</h5></div>
                    <div class="card card1 my-2"><h5>&nbsp; Costo: {{$producto->costo}} </h5></div>
                    <div class="card card1 my-2"><h5>&nbsp; Ganancia: {{$producto->ganancia}} </h5></div>
                    <div class="card card1 my-2"><h5>&nbsp; Unidad de medida: {{$producto->medidaId}}</h5></div>
                </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
@endsection