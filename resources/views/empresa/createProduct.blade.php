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
    <div class="row" style="margin-top:90px">

        <div class="col-md-offset-3 col-md-6">
			<div class="panel-body" style="padding:30px">
			
                <form method="post" action="/empresa/addProducts/{{ auth('empresa')->user()->id }}" enctype="multipart/from-data">
					{{ csrf_field() }}
    				<div class="form-group">
    					<label for="nombre">Nombre</label>
    					<input type="text" name="nombre" id="nombre" class="form-control">
					</div>

					<div class="form-group">
						<label for="precio">Precio</label>
    					<input type="text" name="precio" id="precio" class="form-control">

					</div>
					<div class="form-group">
						<label for="imagen">Imagen</label>
    					<input type="text" name="imagen" id="imagen" class="form-control">

					</div>

					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
						Añadir Producto
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/homeE.js') }}" ></script>
@endsection
