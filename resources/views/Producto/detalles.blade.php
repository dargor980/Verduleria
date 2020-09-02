@extends('plantilla')

@section('titulo', 'Productos')

@section('contenido')
<br><br><br>
<div class="container">
    <div class="modal-content my-2">
        <br>
        <div>
            <div class="text-right mr-5">
                <span><a href="{{route('editprod',$producto->id)}}" ><i class="fas fa-edit text-success btn btn-light"></a></i></span>
                <span><a href="{{route('deleteprod', $producto->id)}}" ><i class="fas fa-trash-alt text-danger btn btn-light"></a></i></span>
            </div>
            <h1 class="my-2 text-white text-center">{{$producto->nombre}}</h1>
        </div>
        <h3 class="text-white text-center col-md-6 mb-4">Datos del producto:</h3>
        <div class="row mb-3">
            <div class="col-md-3"></div>
                <div class="col-md-6 card card4">
                    <div class="my-2">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-5 text-white"><h5>Precio:</h5></div>
                            <div class="card card1 col-md-3 pl-0 text-center"><h5>${{$producto->precio}}</h5></div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                    <div class="my-2">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-5 text-white"><h5>Costo:</h5></div>
                            <div class="card card1 col-md-3 pl-0 text-center"><h5>${{$producto->costo}}</h5></div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                    <div class="my-2">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-5 text-white"><h5>Ganancia:</h5></div>
                            <div class="card card1 col-md-3 pl-0 text-center"><h5>${{$producto->ganancia}}</h5></div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                    <div class="my-2">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-5 text-white"><h5>Unidad de medida:</h5></div>
                            <div class="card card1 col-md-3 pl-0 text-center"><h5>@foreach($medida as $item){{$item->nombre}}@endforeach</h5></div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
            <div class="col-md-3"></div>
        </div>
        <div class="text-center m-3">
            <a href="{{route('listaprod')}}"><button class="btn btn-success mb-3 text-white"><i class="fas fa-arrow-left text-white"></i> Volver</button></a>
        </div>
    </div>
</div>
@endsection