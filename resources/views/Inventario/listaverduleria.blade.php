@extends('plantilla')

@section('titulo', 'Stock')

@section('contenido')
<br>
<div class="container">
  <div class="card card5">
    <h1 class="text-center text-white my-4">Stock de Productos: Verduleria</h1>
    <form action="{{route('searchinventariolista')}}">
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
      <table class="table table-sm table-hover" id="productos">
        <thead>
            <tr class="boton text-white">
              <th scope="col">Cod.</th>
              <th scope="col">Nombre</th>
              <th scope="col">Precio</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Medida</th>
              <th scope="col">Categoria</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
      {{$productos->links()}}
    </div>
  </div>
</div>
@endsection

<script>
    $(document).ready(function(){
        $("#productos").DataTable({
            language: {
                url: "cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json",
            },
            pagingType: "full_numbers",
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: '{!! route('getProducts') !!}',
            columns: [
                {data: 'id', name: 'id'}
                {data: 'nombre', name: 'nombre'},
                {data: 'precio', name: 'precio'}
            ]
        })

    })
</script>
