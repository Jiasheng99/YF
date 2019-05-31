@extends('layouts.master')

@section('css')
<link href="{{ asset('css/homeC.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div id="sidebar">
                <i class="fas fa-times"></i>
                <ul class="menu">
                    <li><a href="{{ url('client/search') }}">Buscar Empresa<i class="fas fa-search"></i></a></li>
                    <li><a href="{{ url('client/viewConfigure/' . auth('client')->user()->id ) }}">Configuración<i class="fas fa-tools"></i></a></li>
                </ul>    
            </div>
        </div>
    </div>
    <table class="table table-stripped text-center" style="margin-top: 50px">
        <thead>
            <tr>
                <th>Codi</th>
                <th>Nombre</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $arrayProductos as $key => $productos )
                <tr>
                    <td> {{ $productos['id'] }} </td>
                    <td> {{ $productos['nombre'] }} </td>
                    <td> {{ $productos['precio'] }} €</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('js')
<script src="{{ asset('js/homeC.js') }}" ></script>
@endsection