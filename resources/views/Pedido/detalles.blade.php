@extends('plantilla')

@section('contenido')
<br>
<div class="pdf1" style="width: 21cm;">
    <div class="contactoemp">
        <img src="/img/comidapdf.png" class="imagenpdf">
        <div class="detallecontacto">
        <a href="{{route('export')}}"><h1>Probando</h1></a>
        </div>
    </div>
</div>
<br><br>
@endsection