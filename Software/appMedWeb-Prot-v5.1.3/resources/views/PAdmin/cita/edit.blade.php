@extends('layouts.panel-padmin')

@section('title', '| Citas-Editar')
@section('title-panel', ' Citas')

@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3 class="page-header">Editar <small>Cita</small></h3>
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
		{!!Form::model($cita,['method'=>'PUT','route'=>['citas.update',$cita->IdCita]])!!}
		{{--method_field('PUT')}}--}}
		{!!Form::token()!!}
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-3">
							<div class="form-group">
								<label for="FechaCita control-label">Fecha: </label>
								<div class="input-group date">
									<input type="text" class="form-control" name="FechaCita" id="FechaCita" value="{{$cita->FechaCita}}"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<label for="IdExpediente">Paciente:</label>
								<input type="hidden" name="IdExpediente" value="{{$cita->IdExpediente}}">
								<p class="form-control-static">
									{{$cita->IdExpediente.' | '.$cita->expediente->Nombres.' '.$cita->expediente->Apellidos}}
								</p>
							</div>
						</div>
						
						<div class="col-md-2">
							<div class="form-group">
								<label for="AreaMedica">Area Médica:</label>
								<p class="form-control-static">
									{{$cita->medico->areamedica->AreaMedica}}
								</p>
							</div>
						</div>
						
						<div class="col-md-2">
							<div class="form-group">
								<label for="IdMedico">Médico:</label>
								<input type="hidden" name="IdMedico" value="{{$cita->IdMedico}}">
								<p class="form-control-static">
									{{$cita->medico->persona->Nombres.' '.$cita->medico->persona->Apellidos}}
								</p>
							</div>
						</div>

						<div class="col-md-2">
							<div class="form-group">
								<label for="EstadoCita">Estado Cita:</label>
								<select name="EstadoCita" id="EstadoCita" class="form-control selectpicker dropdown" data-dropup-Auto="false">
									<option value="R" >Realizada</option>
									<option value="P" selected>Pendiente</option>
								</select>
							</div>
						</div>

						<div class="col-md-3 pull-right">
							<div class="form-group">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
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
	<script >
		$(function()
		{
			$('.date').datepicker({
		    format: "yyyy-mm-dd",
		    language: "es",
		    orientation: "auto",
		    todayBtn: "linked",
		    autoclose: true
			});
		});
	</script>
@endsection