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
    <div class="row" style="margin-top:90px; margin-left:350px;">

        <div class="col-md-offset-3 col-md-6">
			<div class="panel-body" style="padding:30px">
			
				<form method="post" action="/empresa/addStaffs/{{auth('empresa')->user()->id}}" enctype="multipart/from-data">
                    {{ csrf_field() }}
    				<div class="form-group">
    					<label for="nombre">Nombre</label>
    					<input type="text" name="nombre" id="nombre" class="form-control" pattern="^[a-zA-Z]{5,}$">
					</div>

					<div class="form-group">
                        <label for="telefono">Telefono</label>
    					<input type="text" name="telefono" id="telefono" class="form-control" pattern="^[1-9][0-9]{8,}$">
					</div>

					<div class="form-group">
                        <label for="email">Email</label>
    					<input type="text" name="email" id="email" class="form-control" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
					</div>

					<div class="form-group">
                        <label for="worktime">Worktime</label>
    					<input type="text" name="worktime" id="worktime" class="form-control" pattern="^[1-9]{1,}[0-9]{0,}$">
					</div>

                    <div class="form-group">
                        <label for="password">Password</label>
    					<input type="text" name="password" id="password" class="form-control" pattern="^[1-9][0-9]{8,}$">
                    </div>
                    
                    <select name="role" id="role">
                        <option value="cocinero">Cocinero</option>
                        <option value="repartidor">Repartidor</option>
                        <option value="cajero">Cajero</option>
                    </select>

					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
							Añadir Staff
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
