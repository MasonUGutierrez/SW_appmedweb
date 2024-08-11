@extends('layouts.panel-admin')
@section('title','| Area Medica-Editar')
@section('title-panel',' Areas Medicas')

@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
			<h3 class="page-header">Editando Area Medica <small>{{$areamedica->AreaMedica}}</small> </h3>
			<!-- Mostrando errores, si es que hay -->
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>				
			@endif
			{!!Form::model($areamedica,['method'=>'PUT','route'=>['areas.update',$areamedica->IdAreaMedica]])!!}
				{{--method_field('PUT')}}--}}
				{!!Form::token()!!}
				<div class="panel panel-default">
					<div class="panel-body no-boder">
						<div class="form-group form-group-sm">
							<label for="AreaMedica">Area Medica:</label>
							<input type="text" name="AreaMedica" id="AreaMedica" class="form-control" value="{{$areamedica->AreaMedica}}" placeholder="Area Medica..">
						</div>
						<div>
							<input type="submit" name="guardar" id="guardar" value="Guardar" class="btn btn-primary ">
							<input type="button" name="reset" id="reset" value="Cancelar" class="btn btn-danger ">
							<!-- <a href="{{url('admin/enfermedades')}}" class="btn btn-danger">Cancelar</a> -->
						</div>
					</div>
				</div>
				
			{!!Form::close()!!}

		</div>		
	</div>
@endsection
@section('campos')
	location.replace("{{url('admin/areas')}}");
@endsection