@extends('plantilla')

@section('titulo', 'Productos')

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

        .dataTables_info{
            color: white !important;
        }
    </style>
<br>
<div class="container">
  <div class="card card5">
      <h1 class="text-center text-white mt-4">Lista de Productos</h1>

    <div class="container table-responsive my-3">
      @if (session('mensaje'))
            <div class="container my-3">
                <div class="alert alert-success">
                    <span><i class="fas fa-check"></i></span>{{session('mensaje')}}
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
      <table class="table table-sm table-hover" id="productos">
        <thead>
          <tr class="boton text-white">
            <th scope="col">Cod.</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Medida</th>
            <th scope="col">Categoria</th>
            <th scope="col">Opción</th>
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
                responsive: true,
                serverSide: true,
                ajax: '{!! route('getProducts') !!}',
                columnDefs: [
                    {
                        searchable: false,
                        targets: [3,4,5],
                    }
                ],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'nombre', name: 'nombre'},
                    {data: 'precio', name: 'precio'},
                    {data: 'medida[0].nombre', name: 'medida[0].nombre'},
                    {data: 'categoria[0].tipo', name: 'categoria[0].tipo'},
                    {
                        data: 'id',
                        render: function(data){
                            return `<span><a href="/producto/detalles/edit/${data}"><i class="fas fa-edit text-success">&nbsp;</i></a></span>
                                    <span><a href="/producto/delete/${data}"><i class="fas fa-trash-alt text-danger"></i></a></span>
                                     `
                        }

                    }
                ]
            })
        })



</script>

@endsection
