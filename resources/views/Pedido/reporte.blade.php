@extends('Pedido.plantillareporte')

@section('contenido')
<main>
  <div id="details2" class="clearfix">
    <div id="titulopedido">Detalle Pedido</div>
    <div id="client">
        <div id="clientedetalle">
            <div class="to">Señor/a:</div>
            <h2 class="name">Braulio Argandoña Carrasco</h2>
            <div class="address">Ester Hunneus 2045, Puente Alto</div>
            <div class="email">+569 501 61 342</div>
        </div>
    </div>
  </div>
  <table cellspacing="0" cellpadding="0" id="tabla">
    <thead>
      <tr>
        <th class="no">#</th>
        <th class="desc">PRODUCTO</th>
        <th class="precio">PRECIO</th>
        <th class="qty">CANTIDAD</th>
        <th class="unit">MEDIDA</th>
        <th class="total">SUBTOTAL</th>
      </tr>
    </thead>
    <tbody>
      @php $i=0 @endphp
      @foreach ($data as $item)
        @php $i++ @endphp
        
        @if ($i == 24)
        @php $i=28 @endphp
        <div style="page-break-before: always; "></div>
        <tr style="visibility: hidden; ">
          <td colspan="6"></td>
        </tr>
        <tr>
          <td class="nodetalle">20</td>
          <td class="descdetalle"><h3>{{$item->nombre}}</h3></td>
          <td class="preciodetalle">$1200</td>
          <td class="qtydetalle">2</td>
          <td class="unitdetalle">Kg</td>
          <td class="totaldetalle">$2400</td>
        </tr>
        @else
          @if ($i%28==0)
            <div style="page-break-before: always; "></div>
            <tr style="visibility: hidden; ">
              <td colspan="6"></td>
            </tr>
            <tr>
              <td class="nodetalle">25</td>
              <td class="descdetalle"><h3>{{$item->nombre}}</h3></td>
              <td class="preciodetalle">$1200</td>
              <td class="qtydetalle">2</td>
              <td class="unitdetalle">Kg</td>
              <td class="totaldetalle">$2400</td>
            </tr>
          @else
            <tr>
              <td class="nodetalle">{{$item->id}}</td>
              <td class="descdetalle"><h3>{{$item->nombre}}</h3></td>
              <td class="preciodetalle">$1200</td>
              <td class="qtydetalle">2</td>
              <td class="unitdetalle">Kg</td>
              <td class="totaldetalle">$2400</td>
            </tr>
          @endif
        @endif
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="4"></td>
        <td id="tablafoot1">TOTAL: </td>
        <td id="tablafoot2">$6,500</td>
      </tr>
    </tfoot>
  </table>
</main>
@endsection