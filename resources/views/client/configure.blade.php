@extends('layouts.master')

@section('css')
<link href="{{ asset('css/homeC.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
    @foreach( $arrayClientes as $key => $clientes )
    <div class="col-lg-12 col-ms-12">
        <div id="sidebar">
            <i class="fas fa-times"></i>
            <ul class="menu">
                <li><a href="{{ url('client/search') }}">Buscar Empresa<i class="fas fa-search"></i></a></li>
                <li><a id="a2">Ver historial<i class="fas fa-history"></i></a></li>
                <li><a id="a3">Aceptar Pedido<i class="fas fa-check-circle"></i></a></li>
                <li><a id="a4">Ver Pedido<i class="fas fa-eye"></i></a></li>
                <li><a href="{{ url('client/viewConfigure/' . $clientes['id'] ) }}">Configuración<i class="fas fa-tools"></i></a></li>
            </ul>    
        </div>
    </div>
    @endforeach
    </div>
    <div class="row" style="margin-top:20px">

        <div class="col-md-offset-3 col-md-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">
                        <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                        Modificar Cliente
                    </h3>
                </div>

                <div class="panel-body" style="padding:30px">
                
                    <form method="post" action="/client/configure/{{$arrayClientes->id}}" enctype="multipart/from-data">
                        {{ csrf_field() }}
                        <!-- {{method_field('PUT')}}  -->
                        <div class="form-group">
                            <label for="nombre">Título</label>
                            <input type="text" value="{{$arrayClientes['nombre']}}" name="nombre" id="nombre" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="telefono">Año</label>
                            <input type="text" value="{{$arrayClientes['telefono']}}" name="telefono" id="telefono" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="direccion">Escritor</label>
                            <input type="text" value="{{$arrayClientes['direccion']}}" name="direccion" id="direccion" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Resumen</label>
                            <input type="text" value="{{$arrayClientes['email']}}" name="email" id="email" class="form-control">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Modificar
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/homeC.js') }}" ></script>
@endsection