@extends('layouts.panel-padmin')

@section('title','| Perfil')

@section('title-panel',' Perfil')

@section('contenido')
	<!-- Cabecera -->
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3 class="page-header">Perfil <small>{{Auth()->user()->name}}</small> <a href="{{URL::action('PerfilPAdminController@edit',Auth()->user()->IdUsuario)}}" class="btn btn-success btn-sm " data-toggle="tooltip" data-placement="bottom" title="Editar Perfil"><span class="fa fa-pencil-square-o fa-fw"></span></a></h3> 

		</div>
	</div>
	<!-- Fin Cabecera -->
	<!-- Datos usuario -->
	<div class="row">
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
								<p class="form-control-static">
									{{$perfilUsuario->name}}
								</p>
							</div>							
						</div>
						<div class="form-group form-group-sm">
							<label for="Rol" class="col-md-4 control-label">Rol</label>
							<div class="col-md-8">
								<p class="form-control-static">
									P. Administrativo
								</p>
							</div>							
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<!-- Fin Datos usuario -->
		<!-- Datos Personales -->
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
									<p class="form-control-static">
										{{$perfilPersona->Cedula}}
									</p>
								</div>							
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Sexo" class="col-md-4 control-label">Sexo:</label>
								<div class="col-md-8">
									@if($perfilPersona->Sexo=='F')
										<p class="form-control-static">
											Femenino
										</p>
									@else
										<p class="form-control-static">
											Masculino
										</p>
									@endif
								</div>							
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Nombres" class="col-md-4 control-label">Nombres:</label>
								<div class="col-md-8">
									<p class="form-control-static">
										{{$perfilPersona->Nombres}}
									</p>
								</div>							
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Apellidos" class="col-md-4 control-label">Apellidos:</label>
								<div class="col-md-8">
									<p class="form-control-static">
										{{$perfilPersona->Apellidos}}
									</p>
								</div>							
							</div>
						</div>
							
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Telefono" class="col-md-4 control-label">Telefono:</label>
								<div class="col-md-8">
									<p class="form-control-static">
										{{$perfilPersona->Telefono}}
									</p>
								</div>							
							</div>
						</div>					
						
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Correo" class="col-md-4 control-label">Correo:</label>
								<div class="col-md-8">
									<p class="form-control-static">
										{{$perfilPersona->Correo}}
									</p>
								</div>							
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Direccion" class="col-md-4 control-label">Direccion:</label>
								<div class="col-md-8">
									<p class="form-control-static ptextarea">
										{{$perfilPersona->Direccion}}
									</p>
								</div>							
							</div>
						</div>
													
					</div>					
				</div>
			</div>
		</div>
		<!-- Fin Datos Personales -->
	</div>
@endsection