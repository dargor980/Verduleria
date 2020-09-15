@extends('plantilla')

@section('titulo', 'Nueva Categoria')

@section('contenido')
<br>
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
                <h4 class="my-2 text-white">Nueva Categoria</h4>
            </div>
        <form method="POST" action="{{route('addcategoria')}}"class="col-12" enctype="multipart/form-data">
                @csrf
            <br>
                @error('tipo')
                    <div class="badge badge-danger float-right"> *El Nombre de la categoria es obligatoria </div>
                @enderror
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                    </div>
                     
                    <input name='tipo' type="text" placeholder="Categoria" class="form-control">
                </div>

                @error('tipo')
                    <div class="badge badge-danger float-right"> *Debe seleccionar una sucursal </div>
                @enderror
                <select name='sucursalId' class="custom-select">
                    <option selected>Seleccione una sucursal:</option>
                    @foreach($sucursales as $item)
                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                    @endforeach
                </select>
                <br>
                <br>
                <button class="btn btn-success mb-3 text-white" type="submit"><i class="fas fa-plus"></i> Añadir</button>
            </form>
        </div>
    </div> 
</div>

<div class="modal-dialog text-center">
    <div class="col-sm-12">
        <div class="modal-content my-2">
        <br>
        @if (session('mensaje2'))
            <div class="container my-3">
                <div class="alert alert-success">
                    {{session('mensaje2')}}
                </div>
            </div>           
        @endif
        @if (session('error'))
            <div class="container my-3">
                <div class="alert alert-success">
                    <span><i class="fas fa-exclamation-triangle text-danger"></i></span>&nbsp;{{session('error')}}
                </div>
            </div>           
        @endif
            <div>
                <h4 class="my-2 text-white">Eliminar Categoria</h4>
            </div>
            <form method="POST" action="{{route('deletecategoria')}}" class="col-12" enctype="multipart/form-data">
                @csrf
            <br>
            @error('categoriaId')
                <div class="badge badge-danger float-right">*Debe seleccionar un producto </div>
            @enderror
            <select name='categoriaId' class="custom-select">
                <option selected value="0">Seleccione una categoria:</option>
                @foreach($categorias as $item)
                <option value="{{$item->id}}">{{$item->tipo}}</option>
                @endforeach
            </select>
            <br>
                <br>
                <button class="btn btn-danger mb-3 text-white" type="submit"><i class="fas fa-trash-alt"></i> Eliminar</button>
            </form>
        </div>
    </div> 
</div>
@endsection