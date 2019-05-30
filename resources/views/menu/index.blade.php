@extends('layouts.master')
@section('content')
<style>
    img{
        width:256px;
        height:171px;
        
    }
    body{
        background-color: #C6C3C3;
    }
    #h1{
        margin-bottom: 100px;
    }
    #coche{
        width: 30%;
                                                                                                                                                                   
    }
    
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    
    <link href="/js/jquery-ui-1.12.1.custom/jquery-ui.structure.css" rel="stylesheet" type="text/css" />
    <link href="/js/jquery-ui-1.12.1.custom/jquery-ui.theme.css" rel="stylesheet" type="text/css" /> 
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>

<h1 id="h1">Productos de Pedido para hacer<h1>
<div class="row">
<table class="table table-sm table-dark">
  <thead>
    <tr>
      <th scope="col">codi</th>
      <th scope="col">id_producto</th>
      <th scope="col">cantidad</th>
      <th scope="col">id_pedido</th>

    </tr>
  </thead>
  <tbody>

@foreach( $arrayProductos as $key => $usu )
<tr>
      <th scope="row">{{$usu['id']}}</th>
      
      <td>{{$usu['id_producto']}}</td>
      <td>{{$usu['cantidad']}}</td>
      <td>{{$usu['id_pedido']}}</td>
      
    </tr>

 @endforeach

 </tbody>
</table>

</div>
@stop