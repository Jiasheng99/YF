<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>
    <!--Scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--Links-->
    <link href="{{ asset('js/jquery-ui-1.12.1.custom/jquery-ui.structure.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('js/jquery-ui-1.12.1.custom/jquery-ui.theme.css') }}" rel="stylesheet" type="text/css" /> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('css')
</head>
<body>
    <div class="container">
    @if(session('cart'))
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12 main-section">
                <div class="dropdown">
                    <button type="button" class="btn btn-info" data-toggle="dropdown">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrito de Compras <span class="badge badge-pill badge-danger">{{ count(session('cart')) }}</span>
                    </button>
                    <div class="dropdown-menu">
                        <div class="row total-header-section">
                            <div class="col-lg-6 col-sm-6 col-6">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count(session('cart')) }}</span>
                            </div>
    
                            <?php $total = 0 ?>
                            @foreach(session('cart') as $id => $details)
                                <?php $total += $details['precio'] * $details['quantity'] ?>
                            @endforeach
    
                            <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                <p>Total: <span class="text-info">{{ $total }} €</span></p>
                            </div>
                        </div>
                    
                            @foreach(session('cart') as $id => $details)
                                <div class="row cart-detail">
                                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                        <img src="{{ $details['imagen'] }}" />
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                        <p>{{ $details['nombre'] }}</p>
                                        <span class="price text-info"> {{ $details['precio'] }} €</span> <span class="count"> Cantidad: {{ $details['quantity'] }}</span>
                                    </div>
                                </div>
                            @endforeach
                        
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                <a href="{{ url('cart') }}" class="btn btn-primary btn-block">Ver todo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12 main-section">
                <div class="dropdown">
                    <button type="button" class="btn btn-info" data-toggle="dropdown">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrito de Compras <span class="badge badge-pill badge-danger">0</span>
                    </button>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="container page">
        @yield('content')
    </div>
@yield('scripts')
</body>
</html>