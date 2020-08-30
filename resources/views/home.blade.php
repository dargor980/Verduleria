@extends('plantilla')

@section('contenido')
<br><br><br>
<div class="container">
    <div class="container card2">
        <br>
        <div class="row">
            <div class="col-md-1"></div>
                <div class="col-md-10">
                    <h1 class="my-3 text-center hit-the-floor">Panel de Administración</h1>
                </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row my-2">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <a href="" style="text-decoration: none;">
                    <div class="opcionmenu1">
                        <div class="row">
                            <div class="col-md-4">
                                <h2><i class="fas fa-shipping-fast text-white pt-4 mt-1 float-right"></i></h2>
                            </div>
                            <div class="col-md-8">
                                <h2 class="py-4 text-white">Nuevo Pedido</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row my-2">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <a href="" style="text-decoration: none;">
                    <div class="opcionmenu2">
                        <div class="row">
                            <div class="col-md-4">
                                <h2><i class="fas fa-file-download text-white pt-4 mt-1 float-right"></i></h2>
                            </div>
                            <div class="col-md-8">
                                <h2 class="py-4 text-white">Exportar Planilla</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row my-2">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <a href="" style="text-decoration: none;">
                    <div class="opcionmenu3">
                        <div class="row">
                            <div class="col-md-4">
                                <h2><i class="fas fa-plus text-white pt-4 mt-1 float-right"></i></h2>
                            </div>
                            <div class="col-md-8">
                                <h2 class="py-4 text-white">Agregar Stock</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <a href="" style="text-decoration: none;">
                <div class="opcionmenu4">
                    <h2 class="text-center py-4 text-white">Cerrar Sesión</h2>
                </div>
                </a>
            </div>
            <div class="col-md-3"></div>
        </div>
        <br><br>
    </div>
</div>
<br>
@endsection
