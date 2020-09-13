@extends('plantilla')
@section('contenido')
<br><br><br><br>
    <div class="container card3 my-5" style="width: 28cm;">
        <h5 class="my-4 text-center hit-the-floor-3">Estadísticas de Clientes</h5>
        <div class="row my-4 px-4">
            <div class="col-md-5 card card4">
                <h4 class="text-center titulotop5 mt-3">Top 5: Mayor Monto</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>N°</td>
                            <td>Nombre</td>
                            <td>58000</td>
                        </tr>                      
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 card card4">
                <h4 class="text-center titulotop5 mt-3">Top 5: Cantidad de pedidos</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cant. Pedidos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>N°</td>
                            <td>Nombre</td>
                            <td>15</td>
                        </tr>     
                    </tbody>
                </table>
            </div>
        </div>  
    </div>
@endsection