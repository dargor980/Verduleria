@extends('plantilla')
@section('titulo', 'Administrar Usuarios')
@section('contenido')
<br><br><br><br>
<div class="container">
    <div class="container">
        <div class="card card5 py-3 my-2 text-center">
        <br>
        @if (session('mensaje2'))
            <div class="container my-3">
                <div class="alert alert-success">
                    {{session('mensaje2')}}
                </div>
            </div>           
        @endif
        @if (session('error'))
            <div class="container my-3">
                <div class="alert alert-success">
                    <span><i class="fas fa-exclamation-triangle text-danger"></i></span>&nbsp;{{session('error')}}
                </div>
            </div>           
        @endif
            <div>
                <h4 class="my-2 text-white text-center">Administrar Usuarios</h4>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <form method="POST" action="" class="col-12" enctype="multipart/form-data">
                        @csrf
                    <br>
                    @error('categoriaId')
                        <div class="badge badge-danger float-right">*Debe seleccionar un usuario</div>
                    @enderror
                    <select name='categoriaId' class="custom-select">
                        <option selected value="0">Seleccione un usuario:</option>
                        <option value="">usuario 1</option>
                    </select>
                    <br>
                        <br>
                        <button class="btn btn-danger mb-3 text-white" type="submit"><i class="fas fa-trash-alt"></i> Eliminar</button>
                    </form>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div> 
</div>
@endsection