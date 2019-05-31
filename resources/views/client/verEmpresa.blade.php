@extends('layouts.master')

@section('css')
<link href="{{ asset('css/homeC.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-ms-12">
            <div id="sidebar">
                <i class="fas fa-times"></i>
                <ul class="menu">
                    <li><a href="{{ url('client/search') }}">Buscar Empresa<i class="fas fa-search"></i></a></li>
                    <li><a href="{{ url('client/viewConfigure/' . auth('client')->user()->id ) }}">Configuración<i class="fas fa-tools"></i></a></li>
                </ul>    
            </div>
        </div>
    </div>
    @if(isset($details))
        <p>Has introducido: <b>{{ $query }}</b></p>
        <h1>Empresas: </h1>
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $empresa)
                    <tr>
                        <td><a href="{{ url('producto/' . $empresa['id'] ) }}">{{ $empresa->nombre }}</a></td>
                        <td> {{ $empresa->email }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif(isset($message))
        <p>Has introducido: <b>{{ $query }}</b></p>
        <h1>Empresas: </h1>
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
                <p>{{ $message }}</p>
        </table>
    @endif
</div>
@endsection

@section('js')
<script src="{{ asset('js/homeC.js') }}" ></script>
@endsection