@extends('plantilla')

@section('titulo', 'Editar')

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
                <h4 class="my-2 text-white">Editar Producto</h4>
            </div>
            <form method="POST" action="{{route('updateprod',$producto->id)}}"  class="col-12" enctype="multipart/form-data">
                @method('PUT')
                @csrf
            <br>
                @error('nombre')
                    <div class="badge badge-danger float-right"> *El Nombre es obligatorio </div>
                @enderror
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                    </div>
                     
                    <input name='nombre' type="text" placeholder="Nombre del producto" class="form-control" value="{{$producto->nombre}}">
                </div>

                @error('precio')
                    <div class="badge badge-danger float-right"> *El Precio de venta es obligatorio </div>
                @enderror
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                    </div>
                    <input name='precio' type="number" placeholder="Precio venta" class="form-control" value="{{$producto->precio}}"> 
                </div>

                @error('costo')
                    <div class="badge badge-danger float-right"> *El Precio costo es obligatorio </div>
                @enderror

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                    </div>
                    <input name='costo' type="number" placeholder="Precio costo" class="form-control" value="{{$producto->costo}}"> 
                </div>

                @error('categoriaId')
                    <div class="badge badge-danger float-right"> *Debe seleccionar una categoría </div>
                @enderror
                <select name='categoriaId' class="custom-select  mb-3">
                    <option selected value="0">Seleccione una categoria:</option>
                    @foreach($categorias as $item)
                    <option value="{{$item->id}}">{{$item->tipo}}</option>
                    @endforeach
                </select>

                @error('medidaId')
                    <div class="badge badge-danger float-right"> *Debe seleccionar una categoría </div>
                @enderror
                <select name='medidaId' class="custom-select  mb-3">
                    <option selected value="0">Seleccione Unidad de Medida:</option>
                    @foreach($unidadMedida as $item)
                    <option value="{{$item->id}}">{{$item->nombre}}</option>  
                    @endforeach                
                </select>
                <br>
                <div class="row justify-content-center">
                    <button class="btn btn-success mb-3 text-white" type="submit"><i class="fas fa-save"></i> Guardar</button>
                    <a class="btn btn-success mb-3 text-white mx-2" href="{{route('listaprod')}}"> <i class="fas fa-reply text-white"></i> Lista</a>
                    <a class="btn btn-success mb-3 text-white" href="{{route('detalleprod',$producto->id)}}"> <i class="fas fa-reply text-white"></i> Producto</a>
                </div>
            </form>
        </div>
    </div> 
</div>
@endsection