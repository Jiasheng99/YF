@extends('layouts.master')

@section('css')
<link href="{{ asset('css/homeE.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div id="sidebar">
                <i class="fas fa-times"></i>
                <ul class="menu">
                    <li><a href="{{ url('empresa/viewStaffs/' . auth('empresa')->user()->id ) }}">Ver Staffs<i class="fas fa-eye"></i></a></li>
                    <li><a href="{{ url('empresa/addStaffs/' . auth('empresa')->user()->id ) }}">Añadir Staffs<i class="fas fa-history"></i></a></li>
                    <li><a href="{{ url('empresa/viewProducts/' . auth('empresa')->user()->id ) }}">Ver Productos<i class="fas fa-eye"></i></a></li>
                    <li><a href="{{ url('empresa/addProducts/' . auth('empresa')->user()->id ) }}">Añadir Productos<i class="fas fa-eye"></i></a></li>
                    <li><a href="{{ url('empresa/viewPedido/' . auth('empresa')->user()->id ) }}">Ver Pedido<i class="fas fa-eye"></i></a></li>
                    <li><a href="{{ url('empresa/viewConfigure/' . auth('empresa')->user()->id ) }}">Configuración<i class="fas fa-tools"></i></a></li>
                </ul>    
            </div>
        </div>
    </div>
    <table class="table table-stripped text-center" style="margin-top: 100px">
        <thead>
            <tr>
                <th>Codi</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach( $arrayProductos as $key => $productos )
                <tr>
                    <td> {{ $productos['id'] }} </td>
                    <td> {{ $productos['nombre'] }} </td>
                    <td> {{ $productos['precio'] }} €</td>
                    <td><a href="{{ url('empresa/editProducts/' . $productos['id'] ) }}">Editar</a>/<a href="{{ url('empresa/deleteProducts/' . $productos['id'] ) }}">Borrar</a><td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('js')
<script src="{{ asset('js/homeE.js') }}" ></script>
@endsection