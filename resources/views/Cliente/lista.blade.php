@extends('plantilla')

@section('titulo', 'Clientes')

@section('contenido')

<div class="container">
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
@php $id;@endphp
<div class="card card5">
    <h1 class="text-center text-white mt-4">Lista de Clientes</h1>
    <div class="container my-3">
      @if (session('mensaje'))
        <div class="container my-3">
            <div class="alert alert-success">
                {{session('mensaje')}}
            </div>
        </div>
      @endif
    <table class="table table-sm table-hover display nowrap" id="clientes">
        <thead>
          <tr class="boton text-white">
            <th scope="col">Nombre</th>
            <th scope="col">Fono</th>
            <th scope="col">Domicilio</th>
            <th scope="col">Depto</th>
            <th scope="col">Opción</th>
          </tr>
        </thead>
        <tbody>


        </tbody>
      </table>

    </div>
    </div>
</div>

    <!--Confirmación eliminación cliente-->
    <div class="modal fade" id="" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-white" id="">Eliminar cliente</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-white">
              <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;Advertencia</strong>: <br><br> Al eliminar el cliente, se eliminarán también todos los datos asociados (incluyendo los pedidos). <br><br> <strong>¿Desea continuar?</strong>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <a href="" id="link" ><button type="button" class="btn btn-success"><i class="fas fa-trash text-white"></i> Eliminar</button></a>
          </div>
        </div>
      </div>
    </div>
    <!--Confirmación eliminación cliente-->

@endsection

@section('scripts')
    <script>

        $(document).ready(function(){
            $("#clientes").DataTable({
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json",
                },
                pagingType: "full_numbers",

                serverSide: true,
                ajax: '{!! route('getCientes') !!}',
                columns: [
                    {data: 'nombre', name: 'nombre'},
                    {data: 'fono', name: 'fono'},
                    {data: 'domicilio', name: 'domicilio'},
                    {data: 'depto', name: 'depto'},
                    {
                        data: 'id',
                        render: function(data){
                            return `<span><a href="/producto/detalles/edit/${data}"><i class="fas fa-edit text-success">&nbsp;</i></a></span>
                                    <span><a href="/producto/delete/${data}"><i class="fas fa-trash-alt text-danger"></i></a></span>
                                     `
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
