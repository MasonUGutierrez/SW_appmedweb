<div class="modal fade" id="Modal-Sesion" tabindex="-1" role="dialog" aria-labelledby="ModalSesion">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content mymodal">
			<div class="modal-header">
				<img src="{{asset('landing/img/Bmilogo.png')}}" class="img-responsive center-block" style="width: 140px;">	
			</div>
			<form method="POST" action="{{route('login')}}">
			{{csrf_field()}}
			<div class="modal-body" style="opacity: .95!important;">								
				<div class="form-group {{$errors->has('name') ? 'has-error' : ' '}}"> <!--Clase para determinar si hay error-->
					<label for="NombreUsuario"><small>Usuario:</small> </label>
					<input type="text" 
						   class="form-control " 
						   name="name" 
						   id="NombreUsuario" 
						   placeholder="Usuario"
						   value="{{old('name')}}" >
					{!!$errors->first('name','<span class="help-block">:message</span>')!!} <!-- Bloque que se mostrara si hay error-->
				</div>
				<div class="form-group {{$errors->has('password') ? 'has-error' : ' '}}">
					<label for="Contraseña"><small>Contraseña:</small> </label>
					<input type="password" 
						   class="form-control" 
						   name="password" 
						   id="Contraseña" 
						   placeholder="Contraseña" >
					{!!$errors->first('password','<span class="help-block">:message</span>')!!}
				</div>
				<!-- <div class="form-group">
					<label><small>Rol:</small></label>
					<select class="form-control " name="Rol">
						<option value="A">Administrador</option>
						<option value="P">Personal Administrativo</option>
						<option value="M">Personal Médico</option>
					</select>
				</div> -->										
			</div>
			<div class="modal-footer text-center" style="opacity: .95!important;">
				<input type="submit" name="submit" class="btn btn-block btn-form" value="Iniciar Sesión">
				<!-- <a href="{{url('admin')}}" class="btn btn-block btn-form">Iniciar Sesión</a> -->
				<!-- <p class="text-center">o</p>
				<div class="text-left">
					<a href="#"><small>Olvidaste tu contraseña?</small></a> |
					<a href="#"><small>Registrarse</small></a>
				</div>	 -->									
			</div>
			</form>	
		</div>		
	</div>
</div>    