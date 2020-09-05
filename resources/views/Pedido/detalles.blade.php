@extends('plantilla')

@section('contenido')
<br><br>
<div class="pdf1" style="width: 21cm;">

    <div class="text-center my-4">
        <a href="{{route('export')}}"><h1>  Descargar PDF</h1></a>
    </div>
    <hr class="bg-light">
    <div class="row">
        <div class="col-md-3">
             <img src="/comidapdf.png" style="height: 100px;" alt="">
        </div>
        <div class="col-md-9">
            <div class="float-right">
                <div>N° Pedido: 15</div>
                <div>Fecha: 04/09/2020</div>
            </div>
             <h2 class="titulo textcolor">Verduleria Santa Gemita</h2>
             <div>Av. Suecia 3097, Ñuñoa</div>
             <div>22204 2965 - 22458 3513</div>
             <div>distribuidorasantagemita@gmail.com</div>
             <div> <i class="fab fa-whatsapp"></i> &nbsp; +569 3096 5828 </div>
        </div>
    </div>
    <hr class="bg-light">
    <h3 class="text-center">Detalle de pedido</h3>
    <div class="Cliente">
        <div>Señor/a:</div>
        <h4 class="textcolor">Braulio Argandoña Carrasco</h4>
        <div>Ester Hunneus 2045, Puente Alto</div>
        <div>+569 501 61 342</div>
    </div>
    
    <div>
        <hr class="bg-light">
        <h3 class="text-white pl-4 text-center">Pedido final</h3>
        <div class="card card5 table-responsive">
            <div class="container tablita">
                <table class="table mt-3 table-sm table-hover">
                    <thead>
                        <tr class="boton text-white">
                        <th scope="col">Cod.</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Medida</th>
                        <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                            <td class="text-center">{{$item->id}}</td>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->precio}}</td>
                            <td>0.5</td>
                            <td>KG</td>
                            <td>19990</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-2 mx-3" style="border-top: 2px solid #ffffff;">
                <h3 class="float-right mr-3">Total: 19990</h3>
            </div>
        </div>
    </div>

    <div class="piepagina pt-4">
        <div class="Cliente text-justify">Usted podrá hacer sus pedidos a cualquier hora, aún en <b>domingo o festivos</b> o estando cerrado el local, llamando al
            <b>FONO: 22458 35 13</b>, en horario normal de trabajo, sirvase llamar de 8:00 a 21:00 hrs, al <b>FONO: 22204 2965</b> indicandonos
            la hora en que debemos entregar la mercaderia.
        </div>
        <h6 class="text-center mt-3">
        NOSOTROS PONEMOS A SU DISPOSICIÓN NUESTRO SERVICIO DE ENTREGA A DOMICILIO
        </h6>
        <hr class="bg-light">
        <div class="text-center">
            Verduleria Santa Gemita / 22204 2965 - 22458 3513 - +569 3096 5828
        </div>
    </div>
</div>
<br><br>
@endsection