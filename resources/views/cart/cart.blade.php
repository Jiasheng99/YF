@extends('layouts.layout')

@section('title', 'Cart')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@endsection 
@section('content')
 
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Producto</th>
            <th style="width:10%">Precio</th>
            <th style="width:8%">Cantidad</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
 
        <?php $total = 0 ?>
 
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
 
                <?php $total += $details['precio'] * $details['quantity'] ?>
 
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ $details['imagen'] }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['nombre'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{ $details['precio'] }} €</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">{{ $details['precio'] * $details['quantity'] }} €</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
 
        </tbody>
        <tfoot>
    
        <tr>
            <td><a href="{{ url('../') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Volver</a></td>
            <td colspan="2" class="hidden-xs"></td>
            
            <td class="hidden-xs text-center"><strong>Total <b id="total"> {{ $total }} </b> €</strong></td>
            <td> <button class="btn btn-primary" id="pagar">Pagar</button></td>
             
        </tr>
        </tfoot>
    </table>
 
				
    <div id="Rpago" title="Pago">
            <p id="TotalFinal"></p>
                <form  action="" method="post" class="PagarFormulario">	
                {{ csrf_field() }}
                <div >
                	<label>Como pagar: </label><br/>
					<select  name="targeta">
					  <option id="E"  value ="Efectivo">Efectivo</option>
					  <option id="V"  value ="Visa">Visa</option>
					  <option id="M"  value="Mastercard">Mastercard</option>
			
					</select>
                        
                </div>
                      <div ><br/>
                	<label>Tipo de pedido: </label><br/>
                	
					<select name="tipopedido">
					  <option value ="parallevar">parallevar</option>
					  <option  value ="comeaqui">comeaqui</option>
					
			
					</select>
                        
                </div>
                <div>
                	<br/>
                    <label>NumeroTargeta:</label>
                    <input id="NumeroP" type="text"  value="5189387896488361" name="n3">
                    
                </div>
                <div style="display: table;">
                	
                    <label>Caducidad Final: </label>
                    
                    <input type="text"  id="Data" value="12/21" name="n4"> 
                    <label for="Data" class="diseñoData">
                        
                    </label>
                    
                </div>
                <div>
                	
                    <label>NumeroDedetras:</label>
                    <input id="NumeroD" type="text" value="432" name="n5">
                </div>
                <input type="hidden" name="total" value="<?php echo $total; ?>" class="form-control" />
                <p>Total para pagar: <?php echo $total." €"; ?></p>
                <button type="button" id="CancelarP" class="btn btn-primary"> Cancelar</button>
                <button type="submit"  id="PagarP" class="btn btn-primary"> Pagar</button>
            </form>
    </div>


    <div id="ERRORESTIENDA">
        <p id="ErroresTienda"></p>
    </div>
 
@endsection
@section('scripts')
<script src="js/project.js"></script>   
 
    <script type="text/javascript">
 
        $(".update-cart").click(function (e) {
           e.preventDefault();
 
           var ele = $(this);
 
            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
 
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
 
            var ele = $(this);
 
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            
        });
 
 
    </script>

@endsection