@extends('plantilla')

@section('titulo', 'Nuevo Producto')

@section('contenido')
<br><br>
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
                <h4 class="my-2 text-white">Nuevo Producto</h4>
            </div>
            <form method="POST" action="{{route('addproducto')}}" class="col-12" enctype="multipart/form-data">
                @csrf
            <br>
                @error('nombre')
                    <div class="badge badge-danger float-right"> *El Nombre es obligatorio </div>
                @enderror
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                    </div>
                     
                    <input name='nombre' type="text" placeholder="Nombre del producto" class="form-control">
                </div>

                @error('precio')
                    <div class="badge badge-danger float-right"> *El Precio es obligatorio </div>
                @enderror
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                    </div>
                    <input name='precio' type="number" min="0" placeholder="Precio venta" class="form-control"> 
                </div>

                @error('costo')
                    <div class="badge badge-danger float-right"> *El Precio costo es obligatorio </div>
                @enderror

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                    </div>
                    <input name='costo' type="number" min="0" placeholder="Precio costo" class="form-control"> 
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

                @error('cantidad')
                    <div class="badge badge-danger float-right"> *El Stock es obligatorio </div>
                @enderror
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-box-open"></i></span>
                    </div>
                    
                    <input name='cantidad' type="number" min="0" placeholder="Cantidad de Stock" class="form-control"> 
                </div>
                @error('medidaId')
                    <div class="badge badge-danger float-right"> *Debe seleccionar una unidad de medida</div>
                @enderror
                <select name='medidaId' class="custom-select  mb-3">
                    <option selected value="0">Seleccione Unidad de Medida:</option>
                    @foreach($unidadMedida as $item)
                    <option value="{{$item->id}}">{{$item->nombre}}</option>  
                    @endforeach                
                </select>

                <br>
                <button class="btn btn-success mb-3 text-white" type="submit"><i class="fas fa-plus"></i> Agregar</button>
            </form>
        </div>
    </div> 
</div>
@endsection