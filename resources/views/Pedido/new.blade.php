@extends('plantilla')

@section('titulo', 'Nuevo Pedido')

@section('contenido')
<br><br>
<div class="pdf" style=" width: 21cm;"> <!--29.7cm altura-->
    <h1 class="text-center text-white">Nuevo Pedido</h1>
    <div id="app">
        <!--Tipo Cliente-->
        <div>
            <hr class="bg-light">
            <h3 class="text-white pl-4">Seleccione una opción:</h3>
            <form action="">
                <div class="row mt-3">
                    <div class="col-md-2"></div>
                    <div class="col-md-4 text-center">
                        <button class="btn btn-success"><i class="fas fa-user-plus"></i> &nbsp; Nuevo Cliente</button>
                    </div>
                    <div class="col-md-4 text-center">
                        <button class="btn btn-success"><i class="far fa-list-alt"></i>&nbsp; Lista de Clientes</button>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </form>
        </div>
        <!--/Tipo Cliente-->

        <!--Nuevo cliente-->
        <div>
            <hr class="bg-light">
            <h3 class="text-white text-center">Nuevo Cliente</h3>
            <form action="">
                <div class="row">
                    <div class="col-md-7">
                        <h5 class="text-white mt-2">Señor(a):&nbsp;</h5>
                    </div>
                    <div class="col-md-5">
                        <h5 class="text-white mt-2">Teléfono:&nbsp;</h5>
                    </div>
                    <div class="col-md-7">
                        @error('nombre')
                        <div class="badge badge-danger float-right"> *El Nombre es obligatorio </div>
                        @enderror
                        <div>
                            <input name='nombre' type="text" placeholder="Nombre del cliente" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5">
                        @error('fono')
                        <div class="badge badge-danger float-right"> El Teléfono es obligatorio </div>
                        @enderror
                        <div>
                            <input name='fono' type="text" placeholder="Ingrese número" class="form-control"> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <h5 class="text-white mt-2">Domicilio:&nbsp;</h5>
                    </div>
                    <div class="col-md-5">
                        <h5 class="text-white mt-2">Depto:&nbsp;</h5>
                    </div>
                    <div class="col-md-7">
                        @error('domicilio')
                            <div class="badge badge-danger float-right"> El domicilio es obligatorio </div>
                        @enderror
                        <div>
                            <input name='domicilio' type="text" placeholder="Ingrese dirección" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div>
                            <input name='depto' type="text" placeholder="Ingrese depto" class="form-control"> 
                        </div>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <button class="btn btn-success mb-3 text-white" type="submit"><i class="fas fa-plus text-white"></i> Añadir</button>
                </div>
            </form>
        </div>
        <!--/Nuevo cliente-->


        <!--Cliente en lista-->
        <div>
            <hr class="bg-light">
            <h3 class="text-white pl-4">Seleccione Cliente:</h3>
            <!--ERROR: DEBE SELECCIONAR SI O SI UN CLIENTE UWU-->
            <div class="row mt-3">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <select name='' class="custom-select  mb-3">
                        <option selected>Seleccione un cliente:</option>
                        <option value="">Cliente 1</option>
                        <option value="">Cliente 2</option>
                    </select>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <!--/Cliente en lista-->

        <!--Selecciona Productos-->
        <div>
            <hr class="bg-light">
            <h3 class="text-white pl-4">Seleccione los productos:</h3>
            <form action="">
                <ul class="list-inline ml-5 pl-5">
                    <li class="list-inline-item col-md-5 my-1 p-0">
                        <div class="container-fluid cardproducto">    
                        <h6 class="mt-2">
                            <input type="checkbox">
                            Producto 1
                            <div class="col-xs-3 mt-2">
                                <input type="text" class="form-control" placeholder="Cantidad(si queri le poni la medida)">
                            </div>
                        </h6>
                        </div>
                    </li>
                </ul>
                <div class="text-center">
                    <button class="btn btn-success mb-3 text-white" type="submit"><i class="fas fa-plus text-white"></i> Añadir Producto(s)</button>
                </div>
            </form>
        </div>
        <!--/Selecciona Productos-->

        <!--Tabla de productos agregados-->
        {{-- <div>
            <hr class="bg-light">
            <h3 class="text-white pl-4 text-center">Pedido final</h3>
            <form>
                <div class="card table-responsive">
                    <div class="container">
                        <table class="table table-sm table-hover">
                        <thead>
                            <tr class="boton text-white">
                            <th scope="col">Descartar</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Medida</th>
                            <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td class="pl-4"><i class="fas fa-trash-alt text-danger"></a></i></td>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->precio}}</td>
                            <td>0.5</td>
                            <td>@foreach($medidas as $aux)@if($aux->id==$item->medidaId){{$aux->nombre}}@endif @endforeach</td>
                            <td>19990</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                                <tr>
                                    <th class="border-top border-dark"></th>
                                    <th class="border-top border-dark"></th>
                                    <th class="border-top border-dark"></th>
                                    <th class="border-top border-dark"></th>
                                    <th class="border-top border-dark">Total:</th>
                                    <th class="border-top border-dark">2000</th>
                                </tr>
                            </tfoot>
                        </table>
                        {{$productos->links()}}
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-success mb-3 text-white" type="submit"><i class="text-white"></i> Finalizar</button>
                </div>
            </form>
        </div> --}}
        <div>
            <hr class="bg-light">
            <h3 class="text-white pl-4 text-center">Pedido final</h3>
            <form action="">
                <div class="card table-responsive">
                    <div class="container">
                        <table class="table table-sm">
                        <thead>
                            <tr class="boton text-white">
                            <th scope="col">Descartar</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Medida</th>
                            <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td class="pl-4"><i class="fas fa-trash-alt text-danger"></a></i></td>
                            <td>Tomate</td>
                            <td>1200</td>
                            <td>1.8</td>
                            <td>kg</td>
                            <td>2000</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="border-top border-dark"></th>
                                <th class="border-top border-dark"></th>
                                <th class="border-top border-dark"></th>
                                <th class="border-top border-dark"></th>
                                <th class="border-top border-dark">Total:</th>
                                <th class="border-top border-dark">2000</th>
                            </tr>
                        </tfoot>
                        </table>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-success mb-3 text-white" type="submit" data-toggle="modal" data-target="#seguro"><i class="text-white"></i> Finalizar</button>
                </div>
            </form>
        </div>
        <!--/Tabla de productos agregados-->
    </div>
    <div class="modal fade" id="seguro" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-white" id="staticBackdropLabel">Finalizar Pedido</h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-white">
                ¿Estas seguro que desea finalizar el pedido?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
              <button type="button" class="btn btn-success">Finalizar</button>
            </div>
          </div>
        </div>
      </div>
</div>
<br><br>
@endsection
