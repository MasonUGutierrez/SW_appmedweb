@extends('layouts.panel-padmin')

@section('title', '| Citas-Crear')
@section('title-panel', ' Citas')

@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3 class="page-header">Nueva <small>Cita</small></h3>
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
		{!!Form::open(['url'=>'padmin/citas','method'=>'POST','autocomplete'=>'off'])!!}
		{!!Form::token()!!}
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-3">
							<div class="form-group">
								<label for="FechaCita control-label">Fecha: </label>
								<div class="input-group date">
									<input type="text" class="form-control" name="FechaCita" id="FechaCita" value="{{old('FechaCita')}}" placeholder="Ej. 2017-10-18"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<label for="IdExpediente">Paciente:</label>
								<select class="form-control selectpicker dropdown" data-size="5" data-dropup-Auto="false" data-live-search="true" id="IdExpediente" name="IdExpediente">
									@foreach($pacientes as $paciente)
										<option value="{{$paciente->IdExpediente}}">{{$paciente->IdExpediente.' | '.$paciente->Nombres.' '.$paciente->Apellidos}}</option>
									@endforeach
								</select>
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<label for="AreaMedica">Area Médica:</label>
								<select class="form-control selectpicker dropdown" data-size="5" data-dropup-Auto="false" data-live-search="true" id="AreaMedica">
									@foreach($areasmedicas as $area)
										<option value="{{$area->IdAreaMedica}}">{{$area->AreaMedica}}</option>
									@endforeach
								</select>
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<label for="IdMedico">Médico:</label>
								<select class="form-control selectpicker dropdown" data-size="5" data-dropup-Auto="false" data-live-search="true" id="IdMedico" name="IdMedico">
									@foreach($medicos as $medico)
										<!-- Se mostraran solo los medicos que pertenecen a la primer area medica,
											 por defecto la primer area  medica es seleccionada en el select de areas -->
										@if($areasmedicas[0]->IdAreaMedica === $medico->IdAreaMedica)
											{{--<option value="{{$medico->IdMedico}}">{{$medico->Nombres.' '.$medico->Apellidos}}</option>--}}
											<option value="{{$medico->IdMedico}}">{{$medico->persona->Nombres.' '.$medico->persona->Apellidos}}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>

						<div class="col-md-3 pull-right">
							<div class="form-group">
								<input type="submit" name="Enviar" id="Enviar" value="Guardar" class="btn btn-primary">
								<input type="button" name="Cancelar" id="reset" value="Cancelar" class="btn btn-danger">
							</div>
						</div>
					</div>
				</div>
			</div>			
		{!!Form::close()!!}
	</div>
@endsection
@section('campos')
	location.replace("{{url('padmin/citas')}}");
@endsection
@section('script')
<script>
	$(function()
	{
		$('.date').datepicker({
	    format: "yyyy-mm-dd",
	    language: "es",
	    orientation: "auto",
	    todayBtn: "linked",
	    autoclose: true
		});

		//se detecta si cambio la opcion seleccionada en el select de areas medicas
		$('#AreaMedica').on('change',function()
		{
			//guardar el idareamedica seleccionada
			var $idArea = $(this).val();
			//objeto json de todos los medicos traidos como parametros
			var medicos = {!! json_encode($medicos) !!};

			//vaciar el select de medicos
			$("#IdMedico").empty();
			
			//ciclo para evaluar cada medico de la coleccion de medicos
			medicos.forEach(function(elemento)
			{
				//comparar si el idareamedica de cada medico es igual al idareamedica seleccionada
				 if(elemento["IdAreaMedica"] == $idArea)
				 {
				 	//guardar nombres y apellidos que vienen del objeto persona que se relaciona con medico
				 	//.Nombres y .Apellidos son campos propios del modelo Persona
					var nombres = elemento["persona"].Nombres;
					var apellidos = elemento["persona"].Apellidos;			

					//agregar el medico que coincidio en el select de medicos, que se supone esta vacio
					$('#IdMedico').append($(`<option value="${elemento["IdMedico"]}">
					${ nombres + " " + apellidos}
					</option>`));
				 }
				 // ${ nombres + " " + apellidos}
				 // ${elemento["Nombres"] + " " + elemento["Apellidos"]}
			});
			//recargar el componente selectpicker para que se vean los cambios
			$("#IdMedico").selectpicker('refresh');
		});
	});

</script>
@endsection