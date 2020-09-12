@extends('plantilla')

@section('titulo', 'Añadir Stock')

@section('contenido')
<br>

<div class="container text-center">
    <div class="modal-content my-1">
        @if (session('mensaje'))
            <div class="container my-3">
                <div class="alert alert-success">
                    {{session('mensaje')}}
                </div>
            </div>           
        @endif
        <div>
            <h2 class="my-2 mt-3 text-white">Stock de Producto</h2>
        </div>
        
        
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <form method="POST" action="{{route('updatestock')}}" class="col-12" enctype="multipart/form-data">
                    @csrf
                    @error('stockId')
                        <div class="badge badge-danger float-right">*Debe seleccionar un producto </div>
                    @enderror
                    <select name='stockId' class="custom-select my-2">
                        <option selected value="0">Seleccione producto:</option>
                        @foreach($productos as $item)
                        <option value="{{$item->stockId}}">{{$item->nombre}}</option>
                        @endforeach
                    </select>
                    @error('cantidad')
                        <div class="badge badge-danger float-right">*El Stock es obligatorio </div>
                    @enderror
                    <div class="input-group form-group mt-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-box-open"></i></span>
                        </div>
                       
                        <input name='cantidad' type="number" min="0" placeholder="Cantidad de Stock" class="form-control"> 
                    </div>
                    <button class="btn btn-success text-white mt-2" type="submit"><i class="fas fa-cash-register"></i> Enviar</button>
                </form>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="modal-content my-2 table-responsive">
        <h2 class="text-white my-2">Stock Actual</h2>
        <div class="container mt-2">
            <table class="table table-sm table-hover">
                <thead>
                <tr class="boton text-white">
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Medida</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Opción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productos as $item)
                <tr>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->precio}}</td>
                    <td>@foreach($stocks as $cantidad)@if($cantidad->id==$item->stockId){{$cantidad->cantidad}}@endif @endforeach</td>
                    <td>@foreach($medidas as $medida) @if($medida->id==$item->medidaId) {{$medida->nombre}}@endif @endforeach</td>
                    <td>@foreach($categorias as $categoria)@if($categoria->id==$item->categoriaId) {{$categoria->tipo}} @endif  @endforeach</td>
                    <td>
                        <span><a href="{{route('editprod',$item->id)}}" ><i class="fas fa-edit text-success">&nbsp;</a></i></span>
                        <span><a href="{{route('deleteprod',$item->id)}}" ><i class="fas fa-trash-alt text-danger"></a></i></span>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div>  
                {{$productos->links()}}
            </div>
        </div>
    </div>
</div>
@endsection