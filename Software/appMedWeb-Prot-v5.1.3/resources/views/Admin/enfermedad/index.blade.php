@extends('layouts.panel-admin')

@section('title','| Enfermedades')
@section('title-panel',' Enfermedades')

@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3 class="page-header">Listado <small>Enfermedades</small> <a href="{{url('admin/enfermedades/create')}}" class="btn btn-success btn-sm ">Nuevo</a></h3> 
			
			<!-- Incluyendo la plantilla de la busqueda -->
			{{-- @include ('admin.enfermedad.search') --}}
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-primary text-left no-boder ">
				<div class="panel-body ">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-condensed table-hover" id="tablaContenido">
							<thead>
								<th class="text-center">Id Enfermedad</th>
								<th class="text-center">Enfermedad</th>
								<th class="text-center">Fecha Ingreso</th>
								<th class="text-center">Opciones</th>
							</thead>
							<tbody>
								@foreach($enfermedades as $enfermedad)
									<tr class="text-center">
										<td>{{$enfermedad->IdEnfermedad}}</td>
										<td>{{$enfermedad->Enfermedad}}</td>
										<td>{{$enfermedad->FechaIngreso}}</td>
										<td>
											<!-- al llamar un formulario que se editara es necesario usar el siguiente metodo -->
											<a href="{{URL::action('Administrador\EnfermedadController@edit',$enfermedad->IdEnfermedad)}}" class="btn btn-info">Editar</a>
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
