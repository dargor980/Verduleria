@extends('plantilla')

@section('titulo', 'Productos')

@section('contenido')
<br>
<div class="container">
  <div class="card card5">
      <h1 class="text-center text-white mt-4">Lista de Productos</h1>
      <form action="{{route('searchproductolista')}}">
          @method('POST')
          @csrf
          <div class="row">
            <h3 class="text-white pl-4 ml-2 my-3">Buscar producto:</h3>
            <div class="input-group md-form form-sm form-2 pl-2 my-3" style="width: 400px;">
              <input class="form-control my-0 py-1 lime-border" type="text" placeholder="Buscar" name="search">
              <div class="input-group-append">
                <button class="btn input-group-text lime lighten-2" id="basic-text1" type="submit"><i class="fas fa-search text-grey"aria-hidden="true"></i></button>
              </div>
            </div>
          </div>
      </form>
    <div class="container table-responsive">
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