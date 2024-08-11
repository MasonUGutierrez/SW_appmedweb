@extends('layouts.panel-padmin')

@section('title','| Citas')

@section('title-panel',' Citas')

@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3 class="page-header">Listado <small>Citas</small> <a href="{{url('padmin/citas/create')}}" class="btn btn-success btn-sm" data-toggle="tooltip" title="Nueva Cita"><span class="fa fa-plus"></span></a></h3>
		</div>
	</div>
	<!-- Citas del dia -->
	<div></div>

	@if(session()->has('mensaje'))
		<div class="alert alert-{{session('mensaje')['color']}} alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>{{session('mensaje')['m']}}</strong>
		</div>
	@endif
	<!-- Citas Generales -->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-default text-left no-boder">
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-condensed table-hover" id="tablaContenido">
							<thead>
								<th class="text-center">No. Cita</th>
								<th class="text-center">Fecha Cita</th>
								<th class="text-center">Paciente</th>
								<th class="text-center">Area Medica</th>
								<th class="text-center">Médico</th>
								<th class="text-center">Estado Cita</th>
								<th class="text-center">Opciones</th>
							</thead>
							<tbody>
								@foreach($citasgenerales as $cita)
									<tr class="text-center">
										<td>{{$cita->IdCita}}</td>
										<td>{{$cita->FechaCita}}</td>
										<td>{{$cita->expediente->Nombres.' '.$cita->expediente->Apellidos}}</td>
										<td>{{$cita->medico->areamedica->AreaMedica}}</td>
										<td>{{$cita->medico->persona->Nombres.' '.$cita->medico->persona->Apellidos}}</td>
										@if($cita->EstadoCita=='P')
											<td><span class="label label-warning">Pendiente</span></td>
										@elseif($cita->EstadoCita=='C')
											<td><span class="label label-danger">Cancelada</span></td>
										@else
											<td><span class="label label-success">Realizada</span></td>
										@endif										
										<td>
											<!-- al llamar un formulario que se editara es necesario usar el siguiente metodo -->
											<a href="{{URL::action('PAdministrativo\CitaController@edit',$cita->IdCita)}}" class="btn btn-info " data-toggle="tooltip" data-placement="top" title="Editar"><span class="fa fa-pencil-square-o"></span></a>
											@if($cita->EstadoCita=='C'|| $cita->EstadoCita=='R')
												<a href="#Modal-Cancelar-{{$cita->IdCita}}" class="btn btn-warning hidden" data-toggle="modal" rel="tooltip" data-placement="top" title="Cancelar"><span class="fa fa-ban"></span></a>
											@else
												<a href="#Modal-Cancelar-{{$cita->IdCita}}" class="btn btn-warning " data-toggle="modal" rel="tooltip" data-placement="top" title="Cancelar"><span class="fa fa-ban"></span></a>
											@endif
											<a href="#Modal-Eliminar-{{$cita->IdCita}}" class="btn btn-danger " data-toggle="modal" rel="tooltip" data-placement="top" title="Eliminar"><span class="fa fa-trash-o"></span></a>
											@include('PAdmin.cita.modalcancelar')
											@include('PAdmin.cita.modaleliminar')
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
	<!-- Citas pendientes, canceladas y realizadas -->
	<div></div>
@endsection