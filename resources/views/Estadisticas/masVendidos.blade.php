@extends('plantilla')
@section('contenido')
<br>
    <div class="container card3 my-5" style="width: 28cm;">
        <hr class="bg-light">
        <h4 class="my-4 text-center hit-the-floor-3">Estadísticas de Productos</h4>
        <hr class="bg-light">
        <h4 class="my-4 text-center hit-the-floor-2">Top 10: Productos</h4>
        <div class="row my-4 px-4">
            <div class="col-md-5 card card4">
                <h4 class="text-center titulotop5 mt-3">Más vendidos</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>N°</td>
                            <td>Nombre</td>
                            <td>Categoria</td>
                            <td>58</td>
                        </tr> 
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 card card4">
                <h4 class="text-center titulotop5 mt-3">Más vendidos por categorias</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>N°</td>
                            <td>Categoria</td>
                            <td>Nombre</td>
                            <td>58</td>
                        </tr>     
                    </tbody>
                </table>
            </div>
        </div>

        <hr class="bg-light">

        <h4 class="my-4 text-center hit-the-floor-2">Top 5: Productos por sucursal</h4>

        <div class="row my-4 px-4">
            <div class="col-md-5 card card4">
                <h4 class="text-center titulotop5 mt-3">Congelados</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>N°</td>
                            <td>Nombre</td>
                            <td>Categoria</td>
                            <td>58</td>
                        </tr> 
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 card card4">
                <h4 class="text-center titulotop5 mt-3">Verduleria</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>N°</td>
                            <td>Nombre</td>
                            <td>Categoria</td>
                            <td>58</td>
                        </tr>     
                    </tbody>
                </table>
            </div>
        </div> 
        <hr class="bg-light"> 
    </div>
@endsection