<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('css/index.css') }}">
    </head>
    <body>
        <header>YONGFOOD</header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-ms-12" id="div1">
                    <div class="row">
                        <div class="col-lg image">
                            <img src="{{ URL::asset('/image/operador.png') }}">
                        </div>
                    </div>
                    <div class="row">
                        <p>STAFF</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-ms-12" id="div2">
                    <div class="row">
                        <div class="col-lg image">
                            <img src="{{ URL::asset('/image/hombre.png') }}">
                        </div>
                    </div>
                    <div class="row">
                        <p>CLIENTE</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-ms-12" id="div3">
                    <div class="row">
                        <div class="col-lg image">
                        <img src="{{ URL::asset('/image/empresa.png') }}">
                        </div>    
                    </div>
                    <div class="row">
                        <p>EMPRESA</p>   
                    </div>
                </div>
            </div>
        </div>
        <footer class="page-footer font-small teal pt-4">
            <div class="footer-copyright text-center py-3">© 2019 Copyright:
                <a href="#">Jiasheng & Hong</a>
            </div>
        </footer>

        <!-- Javascript -->
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script src="{{ URL::asset('js/index.js') }}"></script>
    </body>
</html>
