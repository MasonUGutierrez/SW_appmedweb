@extends('layouts.panel-padmin')

@section('title','| Pacientes-Crear')
@section('title-panel',' Pacientes')

@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3 class="page-header">Nuevo <small>Paciente</small></h3>
			@if(count($errors)>0)
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
		</div>		
	</div>

	<div class="row">
	    <form class="form-horizontal" action="{{ route('paciente.store') }}" method="POST" autocomplete="off">
	    	{{ csrf_field() }}
	    	<div class="col-md-12">
	    		<div class="panel panel-primary">
		    		<div class="panel-heading">
		    			<h5 class="panel-title">Datos Personales </h5>
		    		</div>
		    		<div class="panel-body">
		    			<div class="col-md-6">
		    				<div class="form-group">
								<label for="name" class="col-sm-2 control-label">Nombres:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="Nombres" id="name" value="{{old('Nombres')}}" placeholder="Ej. NombreX">
								</div>
							</div>
		    			</div>
		    			
						<div class="col-md-6">
		    				<div class="form-group">
							    <label for="Apellidos" class="col-sm-2 control-label">Apellidos:</label>
							    <div class="col-sm-10">
								    <input type="text" class="form-control" name="Apellidos" id="Apellidos" value="{{ old('Apellidos') }}" placeholder="Ej. ApellidoX">
							    </div>
						  	</div>
		    			</div>

					  	<div class="col-md-6">
							<div class="form-group">
							    <label for="Edad" class="col-sm-2 control-label">Edad:</label>
							    <div class="col-sm-10">
							    	<input type="number" min="1" max="120" class="form-control" name="Edad" id="Edad" value="{{old('Edad')}}" placeholder="Ej. 12, 21">
							    </div>
						  	</div>
						</div>	

						<div class="col-md-6">
					  		<div class="form-group">
							    <label for="TipoSangre" class="col-sm-2 control-label">Tipo de sangre:</label>
							    <div class="col-sm-10">
							    	<select class="form-control selectpicker dropdown" data-dropup-auto="false" name="TipoSangre">
										<option value="A+">A+</option>
										<option value="A-">A-</option>
										<option value="B+">B+</option>
										<option value="B-">B-</option>
										<option value="O+">O+</option>
										<option value="O-">O-</option>
										<option value="AB+">AB+</option>
										<option value="AB-">AB-</option>
									</select>
							    </div>
						  	</div>
					  	</div>

					  	<div class="col-md-6">
					  		<div class="form-group">
							    <label for="Sexo" class="col-sm-2 control-label">Sexo:</label>
							    <div class="col-sm-10">
							      	<select class="form-control selectpicker dropdown" data-dropup-auto="false" name="Sexo">
										<option value="F">Femenino</option>
										<option value="M">Masculino</option>
									</select>
							    </div>
						  	</div>
					  	</div>	  					
										  				
					  	<div class="col-md-6">
					  		<div class="form-group">
							    <label for="Ocupacion" class="col-sm-2 control-label">Ocupación:</label>
							    <div class="col-sm-10">
							      <select class="form-control selectpicker dropdown" data-dropup-auto="false" name="Ocupacion">
										<option value="E">Estudiante</option>
										<option value="T">Trabajador</option>
										<option value="O">Otro</option>
									</select>
							    </div>
						  	</div>
					  	</div>		  
					  	
					  	<div class="col-md-6">
					  		<div class="form-group">
							    <label for="Telefono" class="col-sm-2 control-label">Telefono:</label>
							    <div class="col-sm-10">
							    	<input type="text" class="form-control" name="Telefono" id="Telefono" value="{{old('Telefono')}}" pattern="[0-9]{4}-?[0-9]{4}" placeholder="Ej. xxxx-xxxx ó xxxxxxxx">
							    </div>
						  	</div>
					  	</div>
					  	
					  	<div class="col-md-6">
					  		<div class="form-group">
							    <label for="Correo" class="col-sm-2 control-label">Correo:</label>
							    <div class="col-sm-10">
							    	<input type="email" class="form-control" name="Correo" id="Correo" value="{{old('Correo')}}" placeholder="Ej. Usuario@Correo.com">
							    </div>
						  	</div>
					  	</div>
					  	
					  	<div class="col-md-6">
					  		<div class="form-group">
							    <label for="Direccion" class="col-sm-2 control-label">Dirección:</label>
							    <div class="col-sm-10">
							    	<textarea class="form-control" rows="3" name="Direccion" id="Direccion" placeholder="Ej. Managua">{{old('Direccion')}}</textarea>
							    </div>
						  	</div>
					  	</div>
					  	
					  	<div class="col-md-6">
					  		<div class="form-group">
							    <label for="Alergias" class="col-sm-2 control-label">Alergías:</label>
							    <div class="col-sm-10">
							   		<textarea class="form-control" rows="3" name="Alergias" id="Alergias" placeholder="Ej. Gatos, perros, etc.">{{old('Alergias')}}</textarea>
							    </div>
						  	</div>
					  	</div>
					  	
		    		</div>
		    	</div>
	    	</div>
	    	<div class="col-md-12">
	    		<div class="panel panel-primary">
	    			<div class="panel-heading">
	    				<h5 class="panel-title">Datos Contacto de Emergencia </h5>
	    			</div>
	    			<div class="panel-body">
	    				<div class="col-md-6">
	    					<div class="form-group">
							    <label for="ContactoEmergencia" class="col-sm-3 control-label">Contacto de emergencia</label>
							    <div class="col-sm-9">
							    	<input type="text" class="form-control" name="ContactoEmergencia" id="ContactoEmergencia" value="{{old('ContactoEmergencia')}}" placeholder="Ej. PersonaX">
							    </div>
						  	</div>
	    				</div>
						
						<div class="col-md-6">
	    					<div class="form-group">
							    <label for="TelefonoContacto" class="col-sm-2 control-label">Telefono</label>
							    <div class="col-sm-10">
							    	<input type="text" class="form-control" name="TelefonoContacto" id="TelefonoContacto" value="{{old('TelefonoContacto')}}" pattern="[0-9]{4}-?[0-9]{4}" placeholder="Ej. xxxx-xxxx ó xxxxxxxx">
							    </div>
						  	</div>
	    				</div>

	    				<div class="col-md-6">
	    					<div class="form-group">
							    <label for="ParentezcoContacto" class="col-sm-2 control-label">Parentezco</label>
							    <div class="col-sm-10">
							    	<select class="form-control selectpicker dropdown" data-dropup-auto="false" name="ParentezcoContacto">
										<option value="F">Familiar</option>
										<option value="C">Conocido/a</option>
									</select>
							    </div>
						  	</div>
	    				</div>	    				

	    			</div>
	    			<div class="panel-footer">
	    				<div class="form-group">
							<div class="col-sm-offset-1 col-sm-10">
								<button type="submit" class="btn btn-primary">Guardar</button>
								<input type="button" name="Cancelar" id="reset" class="btn btn-danger" value="Cancelar">
							</div>
						</div>
	    			</div>
	    		</div>
	    	</div>		  
		</form>
	</div>
@endsection
@section('campos')
	location.replace("{{url('padmin/paciente')}}");
@endsection