@extends('layouts.panel-admin')

@section('title','| Areas Medicas')
@section('title-panel',' Areas Medicas')

@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3 class="page-header">Listado <small>Areas Medicas</small> <a href="{{url('admin/areas/create')}}" class="btn btn-success btn-sm ">Nuevo</a></h3> 
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-primary text-left no-boder ">
				<div class="panel-body ">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-condensed table-hover" id="tablaContenido">
							<thead>
								<th class="text-center">Id Area</th>
								<th class="text-center">Area Medica</th>
								<th class="text-center">Fecha Ingreso</th>
								<th class="text-center">Opciones</th>
							</thead>
							<tbody>
								@foreach($areasmedicas as $areamedica)
									<tr class="text-center">
										<td>{{$areamedica->IdAreaMedica}}</td>
										<td>{{$areamedica->AreaMedica}}</td>
										<td>{{$areamedica->FechaIngreso}}</td>
										<td>
											<!-- al llamar un formulario que se editara es necesario usar el siguiente metodo -->
											<a href="{{URL::action('Administrador\AreaMedicaController@edit',$areamedica->IdAreaMedica)}}" class="btn btn-info">Editar</a>
											<a href="#Modal-Eliminar-{{$areamedica->IdAreaMedica}}" class="btn btn-danger" data-toggle="modal">Eliminar</a>
											@include('Admin.areamedica.modal')
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
			{{--$enfermedades->render()--}}
		</div>
	</div>

@endsection