@extends('plantilla')

@section('titulo', 'Stock')

@section('contenido')
<br>
<div class="container">
  <div class="card table-responsive">
      <h1 class="text-center text-white my-4">Stock de Productos: Verduleria</h1>
    <div class="container">
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
            <td><a href="{{route('detalleprod',$item->id)}}">{{$item->nombre}}</a></td>
            <td>{{$item->precio}}</td>
            <td>@foreach($stocks as $stock) @if($stock->id==$item->stockId) {{$stock->cantidad}} @endif @endforeach</td>
            <td>@foreach($medidas as $medida) @if($medida->id==$item->medidaId) {{$medida->nombre}} @endif @endforeach</td>
            <td>@foreach($categorias as $categoria) @if($categoria->id==$item->categoriaId) {{$categoria->tipo}} @endif @endforeach</td>
            <td>
              <span><a href="{{route('editprod',$item->id)}}" ><i class="fas fa-edit text-success">&nbsp;</a></i></span>
              <span><a href="{{route('deleteprod',$item->id)}}" ><i class="fas fa-trash-alt text-danger"></a></i></span>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection