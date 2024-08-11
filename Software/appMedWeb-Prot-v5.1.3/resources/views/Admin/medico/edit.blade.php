@extends('layouts.panel-admin')

@section('title','| P. Administrativos-Editar')

@section('title-panel',' P. Administrativos')

@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3 class="page-header">Editando P. Médico <small>{{$medico->Nombres}}</small></h3>
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
		{!!Form::model($medico,['method'=>'PUT','route'=>['medico.update',$medico->IdPersona]])!!}
		{{--method_field('PUT')}}--}}
		{!!Form::token()!!}
		{!!Form::hidden('IdUsuario',$medico->IdUsuario)!!}
		<!-- Datos de Usuario -->
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h5 class="panel-title">Datos Usuario <i class="fa fa-user-plus"></i></h5>
				</div>
				<div class=" panel-container panel-body">
					<div class="form-horizontal">
						<div class="form-group form-group-sm">
							<label for="NombreUsuario" class="col-md-4 control-label">Nombre Usuario:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="name" id="NombreUsuario" required="required" placeholder="Ingrese Usuario" value="{{$medico->name}}">
							</div>							
						</div>
						<div class="form-group form-group-sm">
							<label for="Contraseña" class="col-md-4 control-label">Contraseña:</label>
							<div class="col-md-8" id="C">
								<input class="form-control" type="password" name="password" id="Contraseña" required="required" placeholder="Ingrese Contraseña" value="{{$medico->password}}">
							</div>							
						</div>
						<div class="form-group form-group-sm">
							<label for="RContraseña" class="col-md-4 control-label">Repita su Contraseña:</label>
							<div class="col-md-8" id="RC">
								<input class="form-control" type="password" name="" id="RContraseña" required="required" placeholder="Repite la Contraseña" value="{{$medico->password}}">
							</div>							
						</div>
						<div class="form-group form-group-sm">
							<label for="Rol" class="col-md-4 control-label">Rol</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="" id="Rol" required="required" disabled value="P. Médico" disabled="disabled">
								<input class="hidden" type="text" name="Rol" value="{{$medico->Rol}}">
							</div>							
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<!-- Datos Personales -->
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h5 class="panel-title">Datos Personales <i class="fa fa-book"></i></h5>
				</div>
				<div class="panel-container panel-body">
					<div class="form-horizontal">
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Cedula" class="col-md-4 control-label">Cedula:</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="Cedula" id="Cedula" required="required" placeholder="Ingrese la Cedula" value="{{$medico->Cedula}}">
								</div>							
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Sexo" class="col-md-4 control-label">Sexo:</label>
								<div class="col-md-8">
									<select class="form-control selectpicker" name="Sexo" id="Sexo" required="required">
										@if($medico->Sexo=='F')
											<option name="Sexo" value="F" selected="selected">Femenino</option>
											<option name="Sexo" value="M">Masculino</option>
										@else
											<option name="Sexo" value="F">Femenino</option>
											<option name="Sexo" value="M" selected="selected">Masculino</option>
										@endif
									</select>
								</div>							
							</div>
						</div>	
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Nombres" class="col-md-4 control-label">Nombres:</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="Nombres" id="Nombres" required="required" placeholder="Ingrese los Nombres" value="{{$medico->Nombres}}">
								</div>							
							</div>
						</div>						
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Apellidos" class="col-md-4 control-label">Apellidos:</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="Apellidos" id="Apellidos" required="required" placeholder="Ingrese los Apellidos" value="{{$medico->Apellidos}}">
								</div>							
							</div>
						</div>						
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Telefono" class="col-md-4 control-label">Telefono:</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="Telefono" id="Telefono" required="required" placeholder="Ingrese el Telefono" value="{{$medico->Telefono}}">
								</div>							
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Correo" class="col-md-4 control-label">Correo:</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="Correo" id="Correo" required="required" placeholder="Ingrese el Correo" value="{{$medico->Correo}}">
								</div>							
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-group-sm">
								<label for="Direccion" class="col-md-4 control-label">Direccion:</label>
								<div class="col-md-8">
									<textarea class="form-control" name="Direccion" id="Direccion" rows="3" required="required" placeholder="Ingrese la Direccion"> {{$medico->Direccion}}</textarea>
								</div>							
							</div>
						</div>							
					</div>					
				</div>
			</div>
		</div>
		<!-- Datos Detalle Medico -->
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h5 class="panel-title">Detalles Médico <span class="fa fa-file-text"></span></h5>
				</div>
				<div class="panel-container panel-body">
					<div class="form-horizontal">
						<div class="form-group form-group-sm">
							<label for="IdAreaMedica" class="col-md-4 control-label">Area Médica:</label>
							<div class="col-md-8">
								<select class="form-control selectpicker" name="IdAreaMedica" id="IdAreaMedica" data-live-search="true">
									@foreach($areasmedicas as $area)
										@if($detallesmedico->IdAreaMedica == $area->IdAreaMedica)
											<option value="{{$area->IdAreaMedica}}" selected="selected">{{$area->AreaMedica}}</option>
										@else
											<option value="{{$area->IdAreaMedica}}">{{$area->AreaMedica}}</option>
										@endif										
									@endforeach
								</select>
							</div>							
						</div>
						<div class="form-group form-group-sm">
							<label for="CodMinsa" class="col-md-4 control-label">Cod. Minsa:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="CodMinsa" id="CodMinsa" required="required" placeholder="Ingrese Cod. Minsa" value="{{$detallesmedico->CodMinsa}}">
							</div>
						</div>
						<div class="form-group form-group-sm">
							<label for="Especialidad" class="col-md-4 control-label">Especialidad:</label>
							<div class="col-md-8">
								<input class="form-control" type="textarea" name="Especialidad" id="Especialidad" required="required" placeholder="Ingrese Especialidad" value="{{$detallesmedico->Especialidad}}">
							</div>							
						</div>
						<div class="form-group form-group-sm">
							<label for="SubEspecialidad" class="col-md-4 control-label">SubEspecialidad:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="SubEspecialidad" id="SubEspecialidad" required="required" placeholder="Ingrese SubEspecialidad" value="{{$detallesmedico->SubEspecialidad}}">
							</div>							
						</div>
					</div>
						
				</div>				
			</div>
		</div>
		<!-- Datos Horario Medico -->
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h5 class="panel-title">Horarios <span class="fa fa-calendar"></span></h5>
				</div>
				<div class="panel-container panel-body">
					<div class="col-md-3">
						<div class="form-group form-group-sm">
							<label for="pIdDia" class="control-label">Día</label>
							<select class="form-control selectpicker" name="pIdDia" id="pIdDia">
								@foreach($dias as $dia)
									<option value="{{$dia->IdDia}}">{{$dia->Dia}}</option>
								@endforeach
							</select>
						</div>							
					</div>
					<div class="col-md-3">
						<div class="form-group form-group-sm">
							<label for="pHoraInicio" class="control-label">Hora Inicio:</label>
							<input type="number" name="pHoraInicio" id="pHoraInicio" class="form-control" min="1" max="24" placeholder="24Hrs">
						</div>						
					</div>
					<div class="col-md-3">
						<div class="form-group form-group-sm">
							<label for="pHoraFin" class="control-label">Hora Fin:</label>
							<input type="number" name="pHoraFin" id="pHoraFin" class="form-control" min="1" max="24" placeholder="24Hrs">
						</div>						
					</div>
					<div class="col-md-3">
						<div class="form-group form-group-sm">
							<button type="button" class="btn btn-primary" id="btn_add"><span class="fa fa-plus"></span></button>
						</div>						
					</div>
					<div class="col-md-12">
						<div class="alert alert-danger" id="Error_horario">
							<ul>
								<li>Ingrese un horario para el Médico</li>
							</ul>
						</div>
						<div class="table-responsive">
							<table id="horarios" class="table  table-condensed table-striped table-bordered table-hover">
								<thead class="bg-blue" id="table">
									<th class="text-center">Opciones</th>
									<th class="text-center">Día</th>
									<th class="text-center">Hora Inicio</th>
									<th class="text-center">Hora Fin</th>
								</thead>
								<tbody>
									@foreach($diasmedico as $diamedico)
										<tr class="selected text-center">
											<td>
												<button type="button" class="btn btn-danger" id="eliminar">Eliminar</button>
											</td>
											<td>
												<input type="hidden" name="IdDia[]" value="{{$diamedico->IdDia}}" readonly>
												<p class="form-control-static">{{$diamedico->Dia}}</p>
											</td>
											<td>
												<input type="number" name="HoraInicio[]" value="{{$diamedico->HoraInicio}}" min="1" max="24" class="form-control">
											</td>
											<td>
												<input type="number" name="HoraFin[]" value="{{$diamedico->HoraFin}}" min="1" max="24" class="form-control">
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						
					</div>
					<div class="form-group col-md-12" style="margin-left: 15px;" id="btns">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<input type="submit" class="btn btn-primary " name="guardar" value="Guardar" id="submit">
							<input type="button" class="btn btn-danger " name="Cancelar" value="Cancelar" id="reset">
						</div>
				</div>				
			</div>
		</div>
		{!!Form::close()!!}
	</div>
@endsection
@section('campos')
	location.replace("{{url('admin/usuarios/medico')}}");
@endsection

@section('script')
	<script type="text/javascript">
		$(function()
		{
			$('#Error_horario').hide();

			$("#Contraseña").change(function(){
				$("#RContraseña").removeAttr('disabled');
				$("#RContraseña").focus();
				$("#RContraseña").val("");
			});
			
			$('form').on('submit',function(e)
			{
				// Cuenta cuantas filas tr tienes la tabla #horarios en su tbody
				// cuando se de clic en submit
				var cont = $('#horarios >tbody >tr').length;
				var contra = $('#Contraseña').val();
				var recontra = $('#RContraseña').val();

				if(contra != recontra)
				{
					e.preventDefault();
					$('#RC, #C').addClass('has-error');
					$("#RContraseña").focus();
				}
				if (cont == 0) 
				{
					e.preventDefault();
					$('#table').addClass('bg-danger');
					$('#Error_horario').show();
				}
				else
				{
					$('#table').removeClass('bg-danger');
					$('#Error_horario').hide();
				}
			});

			// Funcion que se ejecuta cuando de el agregar
			$('#btn_add').click(function(){
				Add();
			});

			//Sirve si el elemento ya esta creado en el DOM
			/* $('.eliminar').on('click',function(e)
			{
				e.preventDefault();
				$(this).closest('tr').remove();
			});*/

			// Sirve porque el elemento se crea despues de la ejecucion del DOM
			$(document).on('click', '#eliminar', function (event) {
			    event.preventDefault();
			    // this hace referencia al elemento que hace el clic
			    $(this).closest('tr').remove();
			});
		});
		// Funcion para limpiar inputs
		function Clear_Inputs()
		{			
			$('#pHoraInicio').val("");
			$('#pHoraFin').val("");
		}
		// Funcion para agregar una nueva Fila
		function Add()
		{
			// Si no se agrega var la variable queda como global
			var iddia = $('#pIdDia').val();
			var dia = $('#pIdDia option:selected').text();
			var horainicio = $('#pHoraInicio').val();
			var horafin = $('#pHoraFin').val();
			// alert(typeof(horaincio));
			if (iddia != "" && horainicio != "" && horafin != "") 
			{
				if (parseInt(horafin)<=parseInt(horainicio)) 
				{
					alert('Error al ingresar el horario del Médico');
				}
				else
				{
					var row = '<tr class="selected text-center"><td><button type="button" class="btn btn-danger" id="eliminar">Eliminar</button></td><td><input type="hidden" name="IdDia[]" value="'+iddia+'"><p class="form-control-static">'+dia+'</p></td><td><input type="number" name="HoraInicio[]" value="'+parseInt(horainicio)+'" min="1" max="24" class="form-control"></td><td><input type="number" name="HoraFin[]" value="'+parseInt(horafin)+'" min="1" max="24" class="form-control"></td></tr>';
				
					Clear_Inputs();
					$('#horarios').children('tbody').append(row);
				}
				
			}
			else{
				alert('Error al ingresar el horario del Médico');
			}
		}
	</script>
@endsection