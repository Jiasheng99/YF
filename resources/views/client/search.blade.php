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
<table class="table table-stripped" style="margin-top: 35px">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>CodEmpresa</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $arrayEmpresas as $key => $empresas )
            <tr>
                <td> {{ $empresas['nombre'] }} </td>
                <td> {{ $empresas['codEmpresa'] }} </td>
                <td> {{ $empresas['telefono'] }} </td>
                <td> {{ $empresas['direccion'] }} </td>
                <td> {{ $empresas['email'] }} </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('js')
<script src="{{ asset('js/homeC.js') }}" ></script>
@endsection