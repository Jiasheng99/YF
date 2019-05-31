@extends('layouts.master')

@section('css')
<link href="{{ asset('css/homeC.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div id="sidebar">
                <i class="fas fa-times"></i>
                <ul class="menu">
                    <li><a href="{{ url('client/search') }}">Buscar Empresa<i class="fas fa-search"></i></a></li>
                    <li><a href="{{ url('client/viewConfigure/' . auth('client')->user()->id ) }}">Configuración<i class="fas fa-tools"></i></a></li>
                </ul>    
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12" id="tag">
            <form action="{{ url('client/verEmpresa') }}" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" id="buscar" name="busca">
                    <button type="submit">Buscar</button>
                </div>
            </form>
        </div>
    </div> 
</div>
@endsection

@section('js')
<script src="{{ asset('js/homeC.js') }}" ></script>
@endsection