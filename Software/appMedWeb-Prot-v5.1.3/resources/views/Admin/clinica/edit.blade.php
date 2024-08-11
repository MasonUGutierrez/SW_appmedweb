@extends('layouts.panel-admin')

@section('title','| Clinica-Hospital')

@section('title-panel',' Clinica Hospital')

@section('contenido')
	<!-- Cabecera -->
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3 class="page-header">Mi Clinica <small>{{$clinica->NombreClinica}}</small></h3> 
			@if(count($errors)>0)
				<div class="alert alert-danger">
					<ul>
						@foreach($errors as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
		</div>
	</div>
	<!-- Cuerpo de datos -->
	<div class="row">
		{!!Form::model($clinica,['method'=>'PUT','route'=>['clinica.update',$clinica->IdClinica]])!!}
		{{--method_field('PUT')}}--}}
		{!!Form::token()!!}
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Datos Clinica <span class="fa fa-hospital-o"></span></h3>
				</div>
				<div class="panel-container panel-body">
					<!-- Campos -->
					<div class="form-horizontal">
						<div class="form-group col-md-6 form-group-sm">
							<label for="Ruc" class="col-md-4">
								Cod. Ruc:
							</label>
							<div class="col-md-8">
								<input type="text" name="Ruc" id="Ruc" class="form-control" value="{{$clinica->Ruc}}">
							</div>
						</div>
						<div class="form-group col-md-6 form-group-sm">
							<label for="NombreClinica" class="col-md-4">
								Clinica:
							</label>
							<div class="col-md-8">
								<input type="text" name="NombreClinica" id="NombreClinica" class="form-control" value="{{$clinica->NombreClinica}}">
							</div>
						</div>
						<div class="form-group col-md-6 form-group-sm">
							<label for="Telefono" class="col-md-4">
								Telefono:
							</label>
							<div class="col-md-8">
								<input type="text" name="Telefono" id="Telefono" class="form-control" value="{{$clinica->Telefono}}">
							</div>
						</div>
						<div class="form-group col-md-6 form-group-sm">
							<label for="Correo" class="col-md-4">
								Correo:
							</label>
							<div class="col-md-8">
								<input type="text" name="Correo" id="Correo" class="form-control" value="{{$clinica->Correo}}">
							</div>
						</div>
						<div class="form-group col-md-6 form-group-sm">
							<label for="Url" class="col-md-4">
								Url:
							</label>
							<div class="col-md-8">
								<input type="text" name="Url" id="Url" class="form-control" value="{{$clinica->Url}}">
							</div>
						</div>
						<div class="form-group col-md-6 form-group-sm">
							<label for="Direccion" class="col-md-4">
								Dirección:
							</label>
							<div class="col-md-8">
								<textarea class="form-control" name="Direccion" id="Direccion">{{$clinica->Direccion}}</textarea>
							</div>
						</div>
					</div>
					<!-- Botones -->
					<div class="form-group col-md-12" style="margin-left: 15px;">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<input type="submit" class="btn btn-primary" name="guardar" value="Guardar" id="submit">
							<input type="button" class="btn btn-danger " name="Cancelar" value="Cancelar" id="reset">
						</div>						
				</div>
			</div>
		</div>
		{!!Form::close()!!}
	</div>
@endsection
@section('campos')
	location.replace("{{url('admin/clinica')}}");
@endsection