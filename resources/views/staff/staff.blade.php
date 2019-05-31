@extends('layouts.master')

@section('css')
<link href="{{ asset('css/homeS.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
        @if (auth('staff')->user()->role=='cocinero')
            <div class="col-lg-12 listaproductos">
                <h1>Productos de Pedido para hacer<h1>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Id_producto</th>
                            <th>Cantidad</th>
                            <th>Id_pedido</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $productos as $key => $lineaproducto )
                        <tr>
                            <td>{{ $lineaproducto['id'] }}</td>
                            <td>{{ $lineaproducto['id_producto'] }}</td>
                            <td>{{ $lineaproducto['cantidad'] }}</td>
                            <td>{{ $lineaproducto['id_pedido'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif (auth('staff')->user()->role=='repartidor')
        <div class="col-lg-12 listaproductos">
                <h1>Pedidos pendientes<h1>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Tipo Pedido</th>
                            <th>Estado</th>
                            <th>Precio</th>
                            <th>Id_cliente</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $pedidos as $key => $pedidos )
                        <tr>
                            <td>{{ $pedidos['id'] }}</td>
                            <td>{{ $pedidos['tipopedido'] }}</td>
                            <td>{{ $pedidos['estado'] }}</td>
                            <td>{{ $pedidos['total'] }} €</td>
                            <td>{{ $pedidos['id_cliente'] }}</td>
                            <td><a href="{{ url('staff/repartidorEntregar/' . $pedidos['id'] )}}">Entregar</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif (auth('staff')->user()->role=='cajero')
            <div class="col-lg-12 listaproductos">
                <h1>Pedidos pendientes<h1>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Tipo Pedido</th>
                            <th>Estado</th>
                            <th>Precio</th>
                            <th>Id_cliente</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $pedidos as $key => $pedidos )
                        <tr>
                            <td>{{ $pedidos['id'] }}</td>
                            <td>{{ $pedidos['tipopedido'] }}</td>
                            <td>{{ $pedidos['estado'] }}</td>
                            <td>{{ $pedidos['total'] }} €</td>
                            <td>{{ $pedidos['id_cliente'] }}</td>
                            <td><a href="{{ url('staff/cajeroPagado/' . $pedidos['id'] )}}">Pagado</a>/
                            <a href="{{ url('staff/cajeroPreparado/' . $pedidos['id'] )}}">Preparado</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/homeS.js') }}" ></script>
@endsection