@extends('plantilla')

@section('titulo', 'Administrar Pagos')

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
    <h1 class="text-center text-white my-4">Pagos Pendientes</h1>
    <div class="container table-responsive my-3">
      @if (session('mensaje'))
        <div class="container my-3">
            <div class="alert alert-success">
                {{session('mensaje')}}
            </div>
        </div>
      @endif
    <table class="table table-sm" id="pagos">
        <thead>
          <tr class="boton text-white">
            <th scope="col pl-2">N°</th>
            <th scope="col">Medio de pago</th>
            <th scope="col">Cliente</th>
            <th scope="col">Fecha</th>
            <th scope="col">Total</th>
            <th scope="col">Opción</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>

    </div>
</div>
@endsection

@section('scripts')
        <script>
            $(document).ready(function(){
                $("#pagos").DataTable({
                    language: {
                        url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json",
                    },
                    pagingType: "full_numbers",
                    processing: true,
                    serverSide: true,

                    ajax: '{!! route('getPagos') !!}',
                    columns: [
                        {data: 'id', name: 'id'},
                        {
                            data: 'metodopago',
                            render: function(data){
                                if(data == '2'){
                                    return 'Transferencia';
                                }
                            }
                        },
                        {data: 'link', name: 'link'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'total', name: 'total'},
                        {
                            data: 'id',
                            render: function(data){
                                return `<span><a href="/pedido/administrarpagos/pagado/${data}"><i class="btn btn-success">Marcar Pagado</a></i></span>`
                            }
                        }

                    ],
                    responsive:{
                        details: {
                            display: $.fn.dataTable.Responsive.display.modal( {
                                header: function ( row ) {
                                    var data = row.data();
                                    return 'Details for '+data[0]+' '+data[1];
                                }
                            } ),
                            renderer: $.fn.dataTable.Responsive.renderer.tableAll()
                        }
                    }
                })
            })

        </script>
@endsection
