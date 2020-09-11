@extends('plantilla')

@section('contenido')
    <div class="card card3 my-5 mx-5">
        <h5 class="my-4 text-center hit-the-floor-3">Ganancias del mes</h5>
        <div id="app" class="row mb-3">
            <div class="col-md-4 pt-4">
                <div class="card text-white cardmesactual mb-3" style="width: 18rem; height: 7.7rem;">
                    <div class="ml-2 mt-2 row">
                        <div class="col-md-3">
                            <i class="fas fa-balance-scale-left pt-4" style="font-size: 45px; "></i>
                        </div>
                        <div class="col-md-9">
                            <h5>Mes actual</h5>
                            <h2>$50000000</h2>
                            <h6>22/09/2020 - 22/09/2020</h6>
                        </div>
                    </div>
                </div>
                <div class="card text-white cardmesanterior mb-1" style="width: 18rem; height: 7.7rem;">
                    <div class="ml-2 mt-2 row">
                        <div class="col-md-3">
                            <i class="fas fa-balance-scale-right pt-4" style="font-size: 45px; "></i>
                        </div>
                        <div class="col-md-9">
                            <h5>Mes pasado</h5>
                            <h2>$50000000</h2>
                            <h6>22/09/2020</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 pt-3 card card4">
                <estadistica></estadistica>
            </div>
        </div>
        <hr class="bg-light">
        <h5 class="my-4 text-center hit-the-floor-2">Top 5: Productos más vendidos del mes</h5>
        <div class="row my-4">
            <div class="col-md-5 card card4">
                <h4 class="text-center titulotop5">Verduleria</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>TOMATE</td>
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 card card4">
                <h4 class="text-center titulotop5">Congelados</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>TOMATE</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
