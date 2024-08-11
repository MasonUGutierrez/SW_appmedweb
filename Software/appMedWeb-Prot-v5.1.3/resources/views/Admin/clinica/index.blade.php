@extends('layouts.panel-admin')

@section('title','| Clinica-Hospital')

@section('title-panel',' Clinica Hospital')

@section('contenido')
	<!-- Cabecera -->
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3 class="page-header">Mi Clinica <a href="{{URL::action('Administrador\ClinicaController@edit',$clinica->IdClinica)}}" class="btn btn-success btn-sm " title="Editar Clinica"><span class="fa fa-pencil-square-o fa-fw"></span></a></h3> 
		</div>
	</div>
	<!-- Cuerpo de datos -->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Datos Clinica <span class="fa fa-hospital-o"></span></h3>
				</div>
				<div class="panel-container panel-body">
					<div class="form-horizontal">
						<div class="form-group col-md-6">
							<label for="" class="col-md-4">
								Cod. Ruc:
							</label>
							<div class="col-md-8">
								<p class="form-control-static">
									{{$clinica->Ruc}}
								</p>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label for="" class="col-md-4">
								Clinica:
							</label>
							<div class="col-md-8">
								<p class="form-control-static">
									{{$clinica->NombreClinica}}
								</p>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label for="" class="col-md-4">
								Telefono:
							</label>
							<div class="col-md-8">
								<p class="form-control-static">
									{{$clinica->Telefono}}
								</p>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label for="" class="col-md-4">
								Correo:
							</label>
							<div class="col-md-8">
								<p class="form-control-static">
									{{$clinica->Correo}}
								</p>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label for="" class="col-md-4">
								Url:
							</label>
							<div class="col-md-8">
								<p class="form-control-static">
									{{$clinica->Url}}
								</p>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label for="" class="col-md-4">
								Dirección:
							</label>
							<div class="col-md-8">
								<p class="form-control-static ptextarea">
									{{$clinica->Direccion}}
								</p>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
	<!-- mapa -->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Ubicación <span class="fa fa-globe"></span></h3>
				</div>
				<div class="panel-container panel-body">
					<a href="http://googlemaps.com" target="_blank">
						<img src="https://maps.googleapis.com/maps/api/staticmap?center={{$clinica->Direccion}}&zoom=15&size=900x250&scale=2&markers=size:mid|color:blue|{{$clinica->Direccion}}&key=AIzaSyBxWPosHaS7N2cTOVQkprirhMHyfidS0HQ" class="center img-responsive" style="width:100%;margin:auto;" alt="GoogleMaps API">
					</a>					
				</div>
			</div>
		</div>
	</div>
@endsection