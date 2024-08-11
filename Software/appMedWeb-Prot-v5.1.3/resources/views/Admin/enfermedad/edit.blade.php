@extends('layouts.panel-admin')

@section('title', '| Enfermedades-Editar')

@section('title-panel',' Enfermedades')

@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
			<h3 class="page-header">Editando Enfermedad <small>{{$enfermedad->Enfermedad}}</small></h3>
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

			<!-- Creando formulario -->
			<!-- 
			Al editar los campos del formulario, no se abre el form, es decir
			no se ocupa el Form::open() 
			Se debe ocupar el Form::model()
				Parametros (Recordar el controlador edit, la vista edit recibe como parametro el objeto de acuerdo el id )
					Objeto que se recibe de parametro ($enfermedad)
					array con lo siguiente
						method = especificar que sera PUT, porque se actualizara (accede al metodo update del controlador)

						route
							ruta del archivo update (enfermedades.update) |La ruta debe ser el mero nombre de la ruta del metodo que se quiere ocupar, revisar mejor con php artisan route:list|
							el Id del objeto

						recordar que el metodo update recibe el id como parametro

			-->
			{!!Form::model($enfermedad,['method'=>'PUT','route'=>['enfermedades.update',$enfermedad->IdEnfermedad]])!!}
				{{--method_field('PUT')}}--}}
				{!!Form::token()!!}
				<div class="panel panel-default">
					<div class="panel-body no-boder">
						<div class="form-group form-group-sm">
							<label for="Enfermedad">Enfermedad:</label>
							<input type="text" name="Enfermedad" id="Enfermedad" class="form-control" value="{{$enfermedad->Enfermedad}}" placeholder="Enfermedad..">
						</div>
						<div>
							<input type="submit" name="guardar" id="guardar" value="Guardar" class="btn btn-primary">
							<input type="button" name="reset" id="reset" value="Cancelar" class="btn btn-danger ">
							<!-- <a href="{{url('admin/enfermedades')}}" class="btn btn-danger">Cancelar</a> -->
						</div>
					</div>
				</div>
				
			{!!Form::close()!!}

		</div>		
	</div>

@endsection()
@section('campos')
	location.replace("{{url('admin/enfermedades')}}");
@endsection()

