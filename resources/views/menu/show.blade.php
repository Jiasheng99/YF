<style>
    body{
        background-color: #C6C3C3;
    }
img{
    width:440px;
    height:220px;
}
body{
        background-color: #C6C3C3;
    }
#a{
    
    text-decoration: none;
    padding: 3px;
    padding-left: 10px;
    padding-right: 10px;
    font-family: helvetica;
    font-weight: 300;
    font-size: 25px;
    font-style: italic;
    color: #006505;
    background-color: #82b085;
    border-radius: 15px;
    border: 3px double #006505;
    margin:10px;
    
}
#a:hover{
    opacity: 0.6;
    text-decoration: none;
    background-color: skyblue;
  }
  #b{
    float:right;
    text-decoration: none;
    padding: 3px;
    padding-left: 10px;
    padding-right: 10px;
    font-family: helvetica;
    font-weight: 300;
    font-size: 25px;
    font-style: italic;
    color: #006505;
    background-color: #82b085;
    border-radius: 15px;
    border: 3px double #006505;
    margin:10px;
    
}
#b:hover{
    opacity: 0.6;
    text-decoration: none;
    background-color: skyblue;
  }
</style>

@extends('layouts.master')
@section('content')
<div class="row">
<div class="col-sm-4">
 {{-- TODO: Titulo del Producto --}}
 <h3>{{$arrayProductos['nombre']}}</h3>
</div>
<div class="col-sm-8">
 {{-- TODO: Datos del Producto --}}

 <h5><b>precio: </b>{{$arrayProductos['precio']}}</h5><br/><br/><br/>
 <img src="{{$arrayProductos['imagen']}}" alt="">
</div>
</div>
@stop

<a href="{{ url('../menu') }}"  id="b">
volver listado de Productos
</a>
