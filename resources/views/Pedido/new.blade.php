@extends('plantilla')

@section('titulo', 'Nuevo Pedido')

@section('contenido')
<br><br>
<div class="pdf" style=" width: 21cm;"> <!--29.7cm altura-->
    <h1 class="text-center text-white">Nuevo Pedido</h1>
    <div id="app">
        <pedido></pedido>

       



       

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
