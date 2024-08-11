@extends('layouts.panel-admin')
@section('title','| Areas Medicas-Crear')
@section('title-panel',' Areas Medicas')

@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
			<h3 class="page-header">Nueva <small>Area Medica</small></h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
			{!!Form::open(['url'=>'admin/areas','method'=>'POST','autocomplete'=>'off'])!!}
				{!!Form::token()!!}
				<div class="panel panel-default">
				<div class="panel-body">
					<div class="form-group form-group-sm">
						<label for="AreaMedica">Area Medica</label>
						<input type="text" class="form-control" name="AreaMedica" id="AreaMedica" placeholder="Ingrese el Area Medica">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary " name="guardar" value="Guardar">
						<input type="button" class="btn btn-danger " name="Cancelar" value="Cancelar" id="reset">
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