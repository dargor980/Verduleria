@extends('plantilla')

@section('titulo', 'Resultados de búsqueda')

@section('contenido')
<br>
<div class="container">
  <div class="card card5 table-responsive">
      <h1 class="text-center text-white mt-4">Lista de Productos</h1>
      <h3 class="text-white pl-4 ml-2 my-3">Resultados: AQUI PONER LO QUE SE BUSCO</h3>
    <div class="container">
      @if (session('mensaje'))
            <div class="container my-3">
                <div class="alert alert-success">
                    <span><i class="fas fa-check"></i></span>{{session('mensaje')}}
                </div>
            </div>           
        @endif
      <table class="table table-sm table-hover">
        <thead>
          <tr class="boton text-white">
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Medida</th>
            <th scope="col">Categoria</th>
            <th scope="col">Opción</th>
          </tr>
        </thead>
        <tbody>
          @foreach($productos as $item)
          <tr>
            <td><a href="{{route('detalleprod', $item->id)}}">{{$item->nombre}} </a></td>
            <td>{{$item->precio}}</td>
            <td>@foreach($medidas as $aux)@if($aux->id==$item->medidaId){{$aux->nombre}}@endif @endforeach</td>
            <td>@foreach($categorias as $aux)@if($aux->id == $item->categoriaId){{$aux->tipo}}@endif @endforeach</td>
            <td>
              <span><a href="{{route('editprod', $item->id)}}" ><i class="fas fa-edit text-success">&nbsp;</a></i></span>
                <span><a href="{{route('deleteprod', $item->id)}}" ><i class="fas fa-trash-alt text-danger"></a></i></span>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$productos->links()}}
    </div>
  </div>
</div>

@endsection