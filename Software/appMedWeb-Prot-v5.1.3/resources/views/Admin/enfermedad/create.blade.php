@extends ('layouts.panel-admin')

@section('title','| Enfermedades-Crear')
@section('title-panel',' Enfermedades')
@section ('contenido')

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
			<h3 class="page-header">Nueva <small>Enfermedad</small></h3>
			<!-- Mostrando los errores, si es que hay -->
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<!-- Formulario para el almacenamiento de datos -->
			{!!Form::open(['url'=>'admin/enfermedades','method'=>'POST','autocomplete'=>'off'])!!}
			{!!Form::token()!!}
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="form-group form-group-sm">
						<label for="Enfermedad">Enfermedad</label>
						<input type="text" class="form-control" name="Enfermedad" id="Enfermedad" placeholder="Ingrese la Enfermedad">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" name="guardar" value="Guardar">
						<input type="button" class="btn btn-danger" name="Cancelar" value="Cancelar" id="reset">
					</div>					
				</div>				
			</div>			
			{!!Form::close()!!}
		</div>
	</div>
@endsection

@section('campos')
  	
    if ($("#Enfermedad").val().length==0) {
    	location.replace("{{url('admin/enfermedades')}}");
    }    	 	

@endsection