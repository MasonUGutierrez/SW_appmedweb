@extends('layouts.panel-admin')

@section('title','| P. Administrativo-Crear')

@section('title-panel',' P. Administrativos')

@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3 class="page-header">Nuevo <small>P. Administrativo</small></h3>
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
		{!!Form::open(['url'=>'admin/usuarios/padmin','method'=>'POST','autocomplete'=>'off'])!!}
		{!!Form::token()!!}
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h5 class="panel-title">Datos Usuario <i class="fa fa-user-plus"></i></h5>
				</div>
				<div class="panel-body">
					<div class="form-horizontal">
						<div class="form-group form-group-sm">
							<label for="NombreUsuario" class="col-md-4 control-label">Nombre Usuario:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="name" id="NombreUsuario" required="required" placeholder="Ingrese Usuario" value="{{old('name')}}">
							</div>
							
						</div>
						<div class="form-group form-group-sm">
							<label for="Contraseña" class="col-md-4 control-label">Contraseña:</label>
							<div class="col-md-8" id="C">
								<input class="form-control" type="password" name="password" id="Contraseña" required="required" placeholder="Ingrese Contraseña">
							</div>
							
						</div>
						<div class="form-group form-group-sm">
							<label for="RContraseña" class="col-md-4 control-label">Repita su Contraseña:</label>
							<div class="col-md-8" id="RC">
								<input class="form-control" type="password" name="" id="RContraseña" required="required" placeholder="Repite la Contraseña">
							</div>							
						</div>
						<div class="form-group form-group-sm">
							<label for="Rol" class="col-md-4 control-label">Rol</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="" id="Rol" required="required" value="P.Administrativo" disabled="disabled">
								<input class="hidden" type="text" name="Rol" value="P">
							</div>							
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h5 class="panel-title">Datos Personales <i class="fa fa-book"></i></h5>
				</div>
				<div class="panel-body">
					<div class="form-horizontal">
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Cedula" class="col-md-4 control-label">Cedula:</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="Cedula" id="Cedula" required="required" placeholder="Ingrese la Cedula">
								</div>							
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Sexo" class="col-md-4 control-label">Sexo:</label>
								<div class="col-md-8">
									<select class="form-control selectpicker" name="Sexo" id="Sexo" required="required">
										<option name="Sexo" value="F">Femenino</option>
										<option name="Sexo" value="M">Masculino</option>
									</select>
								</div>							
							</div>
						</div>	
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Nombres" class="col-md-4 control-label">Nombres:</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="Nombres" id="Nombres" required="required" placeholder="Ingrese los Nombres">
								</div>							
							</div>
						</div>						
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Apellidos" class="col-md-4 control-label">Apellidos:</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="Apellidos" id="Apellidos" required="required" placeholder="Ingrese los Apellidos">
								</div>							
							</div>
						</div>						
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Telefono" class="col-md-4 control-label">Telefono:</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="Telefono" id="Telefono" required="required" placeholder="Ingrese el Telefono">
								</div>							
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Correo" class="col-md-4 control-label">Correo:</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="Correo" id="Correo" required="required" placeholder="Ingrese el Correo">
								</div>							
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Direccion" class="col-md-4 control-label">Direccion:</label>
								<div class="col-md-8">
									<textarea class="form-control" name="Direccion" id="Direccion" rows="3" required="required" placeholder="Ingrese la Direccion"></textarea>
								</div>							
							</div>
						</div>
						<div class="form-group col-md-12" style="margin-left: 15px;">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<input type="submit" class="btn btn-primary " name="guardar" value="Guardar" id="submit">
							<input type="button" class="btn btn-danger " name="Cancelar" value="Cancelar" id="reset">
						</div>	
					</div>					
				</div>
			</div>
		</div>
		{!!Form::close()!!}
	</div>
@endsection
@section('campos')
	location.replace("{{url('admin/usuarios/padmin')}}");
@endsection

@section('script')
	<script type="text/javascript">
		$(function()
		{
			$('form').on('submit',function(e)
			{
				var contra = $('#Contraseña').val();
				var recontra = $('#RContraseña').val();

				if(contra != recontra)
				{
					e.preventDefault();
					$('#RC, #C').addClass('has-error');
					$("#RContraseña").focus();
				}
			});
		});
	</script>
@endsection