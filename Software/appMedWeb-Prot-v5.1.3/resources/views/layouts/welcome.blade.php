<!DOCTYPE html>
<html lang="es-ES">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MediWEb.com</title>
   
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
    <link rel="stylesheet" type="text/css" href="{{asset('landing/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('landing/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('landing/css/style.css')}}">
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  	<section id="banner" class="banner">
		<div class="bg-color">
			<nav class="navbar navbar-default navbar-fixed-top">
			  <div class="container">
			  	<div class="col-md-12">
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="#"><img src="{{asset('landing/img/milogo.png')}}" class="img-responsive" style="width: 140px; margin-top: -16px;"></a>
				    </div>
				    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
				      <ul class="nav navbar-nav">
				        <li class="active"><a href="{{url('/#banner')}}">Inicio</a></li>
				        <li class=""><a href="{{url('/#servicio')}}">Servicios</a></li>
				        <li class=""><a href="{{url('/#cta-2')}}">Acerca de</a></li>
				        <li class=""><a href="{{url('/#contactenos')}}">Contactenos</a></li>
				        <li class=""><a href="{{url('/#Modal-Sesion')}}" data-toggle="modal">Iniciar Sesión</a></li>
				        <!-- Modal -->
				        @include('modallogin')
						 <!-- /Modal --> 	
				      </ul>	  
				    </div>
				</div>
			  </div>
			</nav>
			<div class="container">
				<div class="row">
					<div class="banner-info">
						@if(session()->has('flash'))
				      		<div class=" small alert alert-info alert-dismissible center" style>
				      			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				      			{{session('flash')}}
				      		</div>
				      	@endif
						<div class="banner-logo text-center">
							<img src="{{asset('landing/img/milogo.png')}}" class="img-responsive">
						</div>
						<div class="banner-text text-center">
							<h1 class="white">¡¡Salud hasta tu escritorio!!</h1>
							<p>Realiza tus citas médicas de manera rápida y ahorra tiempo en tus tareas diarias.</p>
							<a href="#contactenos" class="btn btn-appoint">Hacer una sugerencia.</a>
						</div>
						<div class="overlay-detail text-center">
			               <a href="{{url('/#servicio')}}"><i class="fa fa-angle-down"></i></a>
			             </div>		
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ banner-->
	<!--service-->
	<section id="servicio" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<h2 class="ser-title">Nuestros Servicios</h2>
					<hr class="botm-line">
					<p>Te brindamos una plataforma para realizar tus gestiones médicas para agilizar los procesos de atención durante tus citas al médico.</div>
				<div class="col-md-4 col-sm-4">
					<div class="service-info">
						<div class="icon">
							<i class="fa fa-stethoscope"></i>
						</div>
						<div class="icon-info">
							<h4>Gestión de expedientes médicos</h4>
							<p>Gestiona de forma ágil los expedientes de tus pacientes.</p>
						</div>
					</div>
					<div class="service-info">
						<div class="icon">
							<i class="fa fa-ambulance"></i>
						</div>
						<div class="icon-info">
							<h4>Servicios</h4>
							<ul>
								<li><p>Gestión de Usuarios</p></li>
								<li><p>Control de Citas</p></li>
								<li><p>Accesibilidad de Expedientes</p></li>
								<li><p>Reportes</p></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="service-info">
						<div class="icon">
							<i class="fa fa-user-md"></i>
						</div>
						<div class="icon-info">
							<h4>Medicos</h4>
							<p>Automatiza tus procesos y brinda un servicio de calidad.</p>
						</div>
					</div>
					<div class="service-info">
						<div class="icon">
							<i class="fa fa-medkit"></i>
						</div>
						<div class="icon-info">
							<h4>Citas</h4>
							<p>Organiza las citas en una estructura calendarizada.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--cta-->
	<section id="cta-1" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="schedule-tab">
    			<div class="col-md-4 col-sm-4 bor-left">
    				<div class="mt-boxy-color"></div>
	    			<div class="medi-info">
		    			<h3>Multi plataforma</h3>
						<p>
							La interface adaptativa en línea de Gestion de Citas y Expedientes de Pacientes permite al médico notificarse de citas en su turno desde su dispositivo favorito.
						</p>
					</div>
    			</div>
				<div class="col-md-4 col-sm-4">
					<div class="medi-info">
		    			<h3>Seguro y simple de usar</h3>
						<p>
							Desarrollado y Diseñado de una manera que el usuario pueda familirizarce rápido con el entorno.
						</p>	
					</div>
				</div>
				<div class="col-md-4 col-sm-4 mt-boxy-3">
					<div class="mt-boxy-color"></div>
					<div class="time-info">
			    		<h3>Accesible en cualquier lugar</h3>
						<p>
							Al estar alojada en línea podra tener acceso al sistema desde cualquier sitio con conexión a Internet. Teniendo a su alcance la herramienta necesaria para gestionar su clinica
						</p>   				    		
					</div>
				</div>
				</div>
			</div>
		</div>
	</section>
	<!--cta-->
	<!--cta 2-->
	<section id="cta-2" class="section-padding">
		<div class="container">
			<div class=" row">
				<div class="col-md-2"></div>
	            <div class="text-right-md col-md-4 col-sm-4">
	              <h2 class="section-title white lg-line">« Acerca de <br> Nosotros »</h2>
	            </div>
	            <div class="col-md-4 col-sm-5">
	            	" En búsqueda de brindar al usuario herramientas con las cuales pueda gestionar sus actividades de una manera agil, eficaz y optima. Trabajamos por ti y para ti. "
	            	<!-- Hoy en dia, existen hospitales y clinicas privadas que realizan una gestion de citas y expedientes de manera ineficiente al momento de brindar  -->
	              <p class="text-right text-primary"><i>—Equipo de desarrollo.</i></p>
	            </div>
	            <div class="col-md-2"></div>
	        </div>
		</div>
	</section>
	<section id="contactenos" class="section-padding">
		<div class="container">
			
		</div>
	</section>
	<!--/ contact-->
	<!--footer-->
	<footer id="footer">
		<div class="top-footer">
			<div class="container">
				<div class="row" style="color: #fff;">
				<div class="col-md-12">
					<h2 class="ser-title" style="color: #fff;">Contactenos</h2>
					<hr class="botm-line">
				</div>
				<div class="col-md-4 col-sm-4">
			      <h3 style="color: #fff;">Dirección:</h3>
			      <div class="space"></div>
			      <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>Universidad Nacional de Ingenieria <br>Managua, Nicaragua</p>
			    </div>
				<div class="col-md-8 col-sm-8 marb20">
					<div class="contact-info">
							<h3 class="cnt-ttl" style="color: #fff;">Formulario de Contacto</h3>
							<div class="space"></div>
                            <div id="sendmessage">Your message has been sent. Thank you!</div>
                            <div id="errormessage"></div>
							<form method="post" role="form" class="contactForm">
							    <div class="form-group">
                                    <input type="text" name="name" class="form-control br-radius-zero" id="name" placeholder="Nombre: " data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control br-radius-zero" name="email" id="email" placeholder="Correo: " data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control br-radius-zero" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Mensaje: " style="max-width: 100%; min-width: 100%; min-height: 150px; max-height: 250px;"></textarea>
                                    <div class="validation"></div>
                                </div>
                                
								<div class="form-action">
									<a href="#banner" class="btn btn-form">Enviar Mensaje</a>
								</div>
							</form>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="footer-line">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						© Copyright <a href="#banner">CapCoinLab</a> {{date("Y")}}. All Rights Reserved
                        <div class="credits">
                        </div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--/ footer-->
    </script>
    <script src="{{asset('landing/js/jquery.min.js')}}"></script>
    <script src="{{asset('landing/js/jquery.easing.min.js')}}"></script>

    <script src="{{asset('landing/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('landing/js/custom.js')}}"></script>
    
    
    
  </body>
</html>