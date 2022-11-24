<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Pedido</title>
    <link rel="stylesheet" href="css/style.css" media="all" />
  </head>
  <body>
    <header>
        <div id="logo">
            <img src="comidapdf.png">
        </div>
        <div id="details3">
            <div>Pedido N°: {{$pedido->id}}</div>
            <div>Fecha: {{$pedido->created_at}}</div>
            @if($pedido->metodopago=='1')<div>Método de pago:  Efectivo</div>@endif
            @if($pedido->metodopago=='2')<div>Método de pago:  Transferencia</div>@endif
            @if($pedido->metodopago=='3')<div>Método de pago:  Tarjeta</div>@endif
        </div>
        <div id="details2">
            <h2 class="titulo">Verduleria Santa Gemita</h2>
            <div>Av. Suecia 3097, Ñuñoa</div>
            <div>22204 2965 - 22458 3513 - 22665 4830</div>
            <div>distribuidorasantagemita@gmail.com</div>
            <div>
                <div id="logowsp"><img src="whatsapp.jpg"> </div>
                +569 3096 5828
            </div>
        </div>
    </header>
    <div style="padding-top: 120px; width: 18.7cm; heigth: 25cm;">
        @yield('contenido')
    </div>
    <footer id="footer">
        <div id="notices">
          <div class="notice">Usted podrá hacer sus pedidos a cualquier hora, aún en <b>domingo o festivos</b> o estando cerrado el local, llamando al
              <b>FONO: 22458 35 13</b>, en horario normal de trabajo, sirvase llamar de 8:00 a 21:00 hrs, al <b>FONO: 22204 2965</b> indicandonos
              la hora en que debemos entregar la mercaderia.
          </div>
        </div>
        <div id="serviciodetalle">
          <h4>
          NOSOTROS PONEMOS A SU DISPOSICIÓN NUESTRO SERVICIO DE ENTREGA A DOMICILIO
          </h4>
        </div>
        <div  id="contactofooter">
          Verduleria Santa Gemita / 22204 2965 - 22458 3513 - + 569 3096 5828 - 22665 4830
        </div>
    </footer>
  </body>
</html>
