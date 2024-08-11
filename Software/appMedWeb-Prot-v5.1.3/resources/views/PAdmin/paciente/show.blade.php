@extends('layouts.panel-padmin')

@section('title','| Pacientes - Consultas')

@section('title-panel',' Expedientes y sus consultas')

@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3 class="page-header">Expediente</small></h3>
		</div>		
	</div>
	<div class="row">
		<div class="container" style="padding-bottom: 20px;">
			<button class="btn btn-danger" name="Regresar" id="Regresar"><span class="fa fa-arrow-left"></span> Volver</button>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">
			    <h5 class="panel-title">Datos del expediente</h5>
			  </div>
			  <div class="panel-body">
			  	<div class="form-horizontal">
			  		<div class="form-group">
						<label class="col-sm-2 control-label">ID Expediente:</label>
						<div class="col-sm-10" >
							<p class="form-control-static">
								{{ $exp->IdExpediente }}
							</p>
						</div>
					</div>

				  	<div class="form-group">
						<label class="col-sm-2 control-label">Nombre Completo:</label>
						<div class="col-sm-10" >
							<p class="form-control-static">
								{{ $exp->Nombres . ' ' . $exp->Apellidos }}
							</p>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group" style="padding-left: 35px;">
							<label class="col-sm-5 control-label">Edad:</label>
							<div class="col-sm-3" >
								<p class="form-control-static">
									{{ $exp->Edad }}
								</p>
							</div>
						</div> 
					</div>
					
					<div class="col-md-4">
						<div class="form-group">
							<label class="col-sm-5 control-label">Tipo de sangre:</label>
							<div class="col-sm-2" >
								<p class="form-control-static">
									{{ $exp->TipoSangre }}
								</p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="col-sm-5 control-label">Sexo:</label>
							<div class="col-sm-3" >
								<p class="form-control-static">
									{{ ($exp->Sexo === 'F') ? 'Femenino' : 'Masculino' }}
								</p>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Ocupación:</label>
						<div class="col-sm-10" >
							<p class="form-control-static">
								{{($exp->Ocupacion === 'E')?'Estudiante':($exp->Ocupacion ==='T')?'Trabajador':'Otro'}}
							</p>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Telefono:</label>
						<div class="col-sm-4" >
							<p class="form-control-static">
								{{ $exp->Telefono }}
							</p>
						</div>
					</div> 
					<div class="form-group">
						<label class="col-sm-2 control-label">Correo:</label>
						<div class="col-sm-4" >
							<p class="form-control-static">
								{{ $exp->Correo }}
							</p>
						</div>
					</div>

					
					<div class="col-md-6">
						<div class="form-group" style="padding-left: 45px;">
							<label class="col-sm-3 control-label">Alergías:</label>
							<div class="col-sm-9" >
								<p class="form-control-static ptextarea">
									{{ $exp->Alergias }}
								</p>
							</div>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-3 control-label">Dirección:</label>
							<div class="col-sm-9" >
								<p class="form-control-static ptextarea">
									{{ $exp->Direccion }}
								</p>
							</div>
						</div>
					</div>	

					<div class="form-group">
						<label class="col-sm-2 control-label">Contacto Emergencia:</label>
						<div class="col-sm-8" >
							<p class="form-control-static">
								{{ $exp->ContactoEmergencia }}
							</p>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Parentezco:</label>
						<div class="col-sm-4">
							<p class="form-control-static">
								{{ ($exp->ParentezcoContacto === 'F') ? 'Familiar' : 'Conocido/a' }}
							</p>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Telefono:</label>
						<div class="col-sm-4" >
							<p class="form-control-static">
								{{ $exp->TelefonoContacto }}
							</p>
						</div>
					</div>
			  	</div>	  	
		  	  </div>
			</div>
		</div>		
	</div>
	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-primary text-left no-boder ">
				<div class="panel-heading">
					<h5 class="panel-title">Consultas</h5>
				</div>
				<div class="panel-body ">
					<div class="table-responsive">
						<table class="table table-condensed table-striped table-bordered table-hover" 
							   id="tablaContenido">
							<thead>
								<th class="text-center">ID</th>
								<th class="text-center">Medico</th>
								<th class="text-center">Padecimiento</th>
								<th class="text-center">Fecha Consulta</th>
								<th class="text-center">Detalles</th>
							</thead>
							<tbody>
								@foreach($exp->consultas as $c)
								<tr class="text-center">
									<td>{{ $c->IdConsulta }}</td>
									<td>
										{{$c->medico->persona->Nombres .' '. $c->medico->persona->Apellidos}}
									</td>
									<td>
										{{$c->Padecimiento}}
									</td>
									<td>{{ $c->FechaConsulta }}</td>
									<td>
										<button type="button" class="btn btn-info" data-toggle="modal" rel="tooltip" title="Detalles" data-target="#myModal{{$c->IdConsulta}}"><span class="fa fa-file-text-o"></span></button>
									</td>
								</tr>

								@component('PAdmin.paciente.dconsulta', 
											['title' => 'Detalle de la consulta',
											 'id' => $c->IdConsulta,
											 'c' => $c])           
						   		@endcomponent
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('script')
	<script>
		$(document).ready(function(){
			$("#Regresar").click(function(){
				window.history.back();
			});
		});
	</script>
@endsection