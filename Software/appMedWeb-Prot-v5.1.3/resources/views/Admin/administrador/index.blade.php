@extends('layouts.panel-admin')

@section('title','| Administradores')

@section('title-panel',' Administradores')

@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3 class="page-header">Listado <small>Administradores</small> <a href="{{url('admin/usuarios/admin/create')}}" class="btn btn-success btn-sm ">Nuevo</a></h3> 
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-primary text-left no-boder ">
				<div class="panel-body ">
					<div class="table-responsive">
						<table class="table table-condensed table-striped table-bordered table-hover" id="tablaContenido">
							<thead>
								<th class="text-center">Id Usuario</th>
								<th class="text-center">Cedula</th>
								<th class="text-center">Nombre</th>
								<th class="text-center">Sexo</th>
								<th class="text-center">Telefono</th>
								<th class="text-center">Correo</th>
								<th class="text-center">Opciones</th>
							</thead>
							<tbody>
								@foreach($administradores as $administrador)
									<tr class="text-center">
										<td>{{$administrador->IdUsuario}}</td>
										<td>{{$administrador->Cedula}}</td>
										<td>{{$administrador->Nombres.' '.$administrador->Apellidos}}</td>
										<td>{{$administrador->Sexo}}</td>
										<td>{{$administrador->Telefono}}</td>
										<td>{{$administrador->Correo}}</td>
										<td>
											<!-- al llamar un formulario que se editara es necesario usar el siguiente metodo -->
											<a href="{{URL::action('Administrador\AdministradorController@edit',$administrador->IdPersona)}}" class="btn btn-info ">Editar</a>
											<a href="#Modal-Eliminar-{{$administrador->IdPersona}}" class="btn btn-danger " data-toggle="modal">Eliminar</a>
											@include('Admin.administrador.modal')
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection