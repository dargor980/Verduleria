@extends('plantilla')

@section('titulo', 'Proveedores')

@section('contenido')
<br><br><br><br><br><br>
<div class="container">
    <div class="modal-content my-2">
        <br>
        <div>
            <div class="text-right mr-5">
                <span><a href="{{route('editprov',$proveedor->id)}}" ><i class="fas fa-edit text-success btn btn-light"></a></i></span>
                <span><a href="{{route('deleteprov',$proveedor->id)}}" ><i class="fas fa-trash-alt text-danger btn btn-light"></a></i></span>
            </div>
            <h2 class="my-2 text-white text-center">{{$proveedor->nombre}}</h2>
        </div>
        <div class="row my-3 mb-5">
            <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h4 class="text-white">Datos del proveedor:</h4>
                    <div class="card card1 my-2"><h5>&nbsp; Empresa: {{$proveedor->empresa}}</h5></div>
                    <div class="card card1 my-2"><h5>&nbsp; Rut: {{$proveedor->rut}} </h5></div>
                    <div class="card card1 my-2"><h5>&nbsp; Fono: {{$proveedor->fono}}</h5></div>
                    <div class="card card1 my-2"><h5>&nbsp; Dirección: {{$proveedor->direccion}}</h5></div>
                    <div class="card card1 my-2 text-justify"><h5>&nbsp; Descripción: {{$proveedor->descripcion}}</h5></div>
                </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
@endsection