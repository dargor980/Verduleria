@extends('Pedido.plantillareporte')

@section('contenido')
<main>
  <div id="details2" class="clearfix">
    <div id="titulopedido">Detalle Pedido</div>
    <div id="client">
        <div id="clientedetalle">
            <div class="to">Señor/a:</div>

            <h2 class="name">{{$pedido->cliente[0]->nombre}}</h2>
          <div class="address">{{$pedido->cliente[0]->domicilio}}, Depto: {{$pedido->cliente[0]->depto}}</div>
            <div class="email">+569 {{$pedido->cliente[0]->fono}}</div>

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
      @foreach ($productos as $item)
        @php $i++ @endphp

        @if ($i == 24)
        @php $i=28 @endphp
        <div style="page-break-before: always; "></div>
        <tr style="visibility: hidden; ">
          <td colspan="6"></td>
        </tr>
        <tr>
          <td class="nodetalle">20</td>
          <td class="descdetalle"><h3>{{$item->producto[0]->nombre}}</h3></td>
          <td class="preciodetalle">${{$item->producto[0]->precio}}</td>
          <td class="qtydetalle">{{$item->cantidad}}</td>
          <td class="unitdetalle">@foreach($medidas as $medida) @if($medida->id==$item->medidaId)  {{$medida->nombre}} @endif @endforeach</td>
          <td class="totaldetalle">${{$item->subtotal}}</td>
        </tr>
        @else
          @if ($i%28==0)
            <div style="page-break-before: always; "></div>
            <tr style="visibility: hidden; ">
              <td colspan="6"></td>
            </tr>
            <tr>
              <td class="nodetalle">25</td>
              <td class="descdetalle"><h3>{{$item->producto[0]->nombre}}</h3></td>
              <td class="preciodetalle">${{$item->producto[0]->precio}}</td>
              <td class="qtydetalle">{{$item->cantidad}}</td>
              <td class="unitdetalle">@foreach($medidas as $medida) @if($medida->id==$item->medidaId)  {{$medida->nombre}} @endif @endforeach</td>
              <td class="totaldetalle">${{$item->subtotal}}</td>
            </tr>
          @else
            <tr>
              <td class="nodetalle">{{$item->producto[0]->id}}</td>
              <td class="descdetalle"><h3>{{$item->producto[0]->nombre}}</h3></td>
              <td class="preciodetalle">${{$item->producto[0]->precio}}</td>
              <td class="qtydetalle">{{$item->cantidad}}</td>
              <td class="unitdetalle">@foreach($medidas as $medida) @if($medida->id==$item->medidaId)  {{$medida->nombre}} @endif @endforeach</td>
              <td class="totaldetalle">${{$item->subtotal}}</td>
            </tr>
          @endif
        @endif
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td id="tablafoot1" colspan="4"></td>
        <td id="tablafoot1">TOTAL: </td>
        <td id="tablafoot2">${{$pedido->total}}</td>
      </tr>
    </tfoot>
  </table>
</main>
@endsection
