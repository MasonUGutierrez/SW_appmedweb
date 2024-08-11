@extends('layouts.panel-padmin')

@section('title','| Pacientes')

@section('title-panel',' Pacientes')

@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3 class="page-header">Listado <small>Pacientes</small> <a href="{{route('paciente.create')}}" class="btn btn-success btn-sm " data-toggle="tooltip" title="Nuevo Paciente"><span class="fa fa-plus"></span></a></h3> 

		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-primary text-left no-boder ">
				<div class="panel-body ">
					<div class="table-responsive">
						<table class="table table-condensed table-striped table-bordered table-hover" id="tablaContenido">
							<thead>
								<th class="text-center">Id</th>
								<th class="text-center">Nombre Completo</th>
								<th class="text-center">Sexo</th>
								<th class="text-center">Telefono</th>
								<th class="text-center">Correo</th>
								<th class="text-center">Dirección</th>
								<th class="text-center">Opciones</th>
							</thead>
							<tbody>
								@foreach($exp as $e)
									<tr class="text-center">
										<td>{{$e->IdExpediente}}</td>
										<td>{{$e->Nombres.' '.$e->Apellidos}}</td>
										<td>{{($e->Sexo=='M')?'Masculino':'Femenino'}}</td>
										<td>{{$e->Telefono}}</td>
										<td>{{$e->Correo}}</td>
										<td>{{$e->Direccion}}</td>
										<td>
											<a href="{{route('paciente.show',['id' => $e->IdExpediente ])}}" class="btn btn-success" data-toggle="tooltip" title="Ver"><span class="fa fa-eye"></span></a>
											<!-- al llamar un formulario que se editara es necesario usar el siguiente metodo -->
											<a href="{{route('paciente.edit',['id' => $e->IdExpediente ])}}" class="btn btn-info " data-toggle="tooltip" title="Editar"><span class="fa fa-edit"></span></a>
											<a href="#Modal-Eliminar-{{$e->IdExpediente}}" class="btn btn-danger " data-toggle="modal" rel="tooltip" title="Eliminar"><span class="fa fa-trash-o"></span></a>
											@include('PAdmin.paciente.modal')
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