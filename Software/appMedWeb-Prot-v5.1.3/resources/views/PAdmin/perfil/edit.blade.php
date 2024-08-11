@extends('layouts.panel-padmin')

@section('title','| Pefil-Editar')

@section('title-panel',' Pefil')

@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3 class="page-header">Editando Mi Perfil</h3>
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
		{!!Form::model($perfilUsuario,['method'=>'PUT','route'=>['paperfil.update',$perfilUsuario->IdUsuario]])!!}
		{{--method_field('PUT')}}--}}
		{!!Form::token()!!}
		{!!Form::hidden('IdUsuario',$perfilUsuario->IdUsuario)!!}
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
								<input class="form-control" type="text" name="name" id="NombreUsuario" required="required" placeholder="Ingrese Usuario" value="{{$perfilUsuario->name}}">
							</div>							
						</div>
						<div class="form-group form-group-sm">
							<label for="Contraseña" class="col-md-4 control-label">Contraseña:</label>
							<div class="col-md-8" id="C">
								<input class="form-control" type="password" name="password" id="Contraseña" required="required" placeholder="Ingrese Contraseña" value="{{$perfilUsuario->password}}">
							</div>							
						</div>						
						<div class="form-group form-group-sm ">
							<label for="RContraseña" class="col-md-4 control-label">Repita su Contraseña:</label>
							<div class="col-md-8" id="RC">
								<input class="form-control" type="password" name="" id="RContraseña" required="required" disabled placeholder="Repite la Contraseña" value="{{$perfilUsuario->password}}">
							</div>							
						</div>
						<div class="form-group form-group-sm">
							<label for="Rol" class="col-md-4 control-label">Rol</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="" id="Rol" required="required" disabled="disabled" value="P. Administrativo">
								<input class="hidden" type="text" name="Rol" value="{{$perfilUsuario->Rol}}">
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
					<div class="form-horizontal"><!-- Formulario datos personales -->
						<div class="col-md-6">
							<div class="form-group form-group-sm"> 
								<label for="Cedula" class="col-md-4 control-label">Cedula:</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="Cedula" id="Cedula" required="required" placeholder="Ingrese la Cedula" value="{{$perfilPersona->Cedula}}">
								</div>							
							</div>
						</div>						
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Sexo" class="col-md-4 control-label">Sexo:</label>
								<div class="col-md-8">
									<select class="form-control selectpicker" name="Sexo" id="Sexo" required="required">
										@if($perfilPersona->Sexo=='F')
										<option name="Sexo" value="F" selected="selected">Femenino</option>
										<option name="Sexo" value="M">Masculino</option>
										@else
										<option name="Sexo" value="F">Femenino</option>
										<option name="Sexo" value="M" selected="selected">Masculino</option>
										@endif
									</select>
								</div>							
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Nombres" class="col-md-4 control-label">Nombres:</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="Nombres" id="Nombres" required="required" placeholder="Ingrese los Nombres" value="{{$perfilPersona->Nombres}}">
								</div>							
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Apellidos" class="col-md-4 control-label">Apellidos:</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="Apellidos" id="Apellidos" required="required" placeholder="Ingrese los Apellidos" value="{{$perfilPersona->Apellidos}}">
								</div>							
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Telefono" class="col-md-4 control-label">Telefono:</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="Telefono" id="Telefono" required="required" placeholder="Ingrese el Telefono" value="{{$perfilPersona->Telefono}}">
								</div>							
							</div>
						</div>						
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Correo" class="col-md-4 control-label">Correo:</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="Correo" id="Correo" required="required" placeholder="Ingrese el Correo" value="{{$perfilPersona->Correo}}">
								</div>							
							</div>
						</div>						
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Direccion" class="col-md-4 control-label">Dirección:</label>
								<div class="col-md-8">
									<textarea class="form-control" name="Direccion" id="Direccion" rows="3" required="required" placeholder="Ingrese la Direccion">{{$perfilPersona->Direccion}}</textarea>
								</div>							
							</div>	
						</div>										

						<div class="form-group col-md-12" style="margin-left: 15px;">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<input type="submit" class="btn btn-primary" name="guardar" value="Guardar" id="submit">
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
	location.replace("{{url('padmin/perfil')}}");
@endsection
@section('script')
	<!-- <script type="text/javascript">
		$("#Contraseña").change(function(){
			$("#RContraseña").removeAttr('disabled');
			$("#RContraseña").focus();
			$("#RContraseña").val("");
		});						
	</script> -->
	<script type="text/javascript">
		$(function()
		{
			$("#Contraseña").change(function(){
				$("#RContraseña").removeAttr('disabled');
				$("#RContraseña").focus();
				$("#RContraseña").val("");
			});
			
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