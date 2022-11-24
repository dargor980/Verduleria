@extends('plantilla')

@section('titulo', 'Stock')

@section('contenido')
    <style>
        input{
            background-color: white !important;

        }

        label{
            color: white;
        }

        select{
            background-color: white !important;
        }

    </style>
<br>
<div class="container">
  <div class="card card5">
    <h1 class="text-center text-white my-4">Stock de Productos: Verduleria</h1>
    <div class="container table-responsive my-3">
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
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $("#productos").DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json",
            },
            pagingType: "full_numbers",
            processing: true,
            responsive: true,
            serverSide: true,
            columnDefs: [
                {
                    searchable: false,
                    targets: [3,4,5],
                }
            ],
            ajax: '{!! route('getProductosVerduleria') !!}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'nombre', name: 'nombre'},
                {data: 'precio', name: 'precio'},
                {data: 'stock[0].cantidad', name: 'stock[0].cantidad'},
                {data: 'medida[0].nombre', name: 'medida[0].nombre'},
                {data: 'categoria[0].tipo', name: 'categoria[0].tipo'},

            ],
            drawCallback: function( settings ) {
                $('a').addClass("pagination");
                $('a').removeClass('paginate_button');
                $('a').addClass('paginate_button');


            }
        })

    })
</script>
@endsection
