<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MediWeb | Administrador - @yield('title')</title>
	<link href="{{asset('dashboard/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('dashboard/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('dashboard/css/datepicker3.css')}}" rel="stylesheet">
	<link href="{{asset('dashboard/css/styles.css')}}" rel="stylesheet">
	<!-- Bootstrap Select Style -->
	<link href="{{asset('dashboard/css/bootstrap-select.min.css')}}" rel="stylesheet">
	<!-- TABLE STYLES-->
    <link href="{{asset('dashboard/js/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet" />
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Menu de Navegacion</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="{{url('admin')}}"><img src="{{asset('dashboard/img/milogo.png')}}" class="img-responsive" style="width: 140px; margin-top: -16px;"></a>
				<ul class="nav navbar-top-links navbar-right">
					<!-- <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
					</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">3 mins ago</small>
										<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
									<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#">New message from <strong>Jane Doe</strong>.</a>
									<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
								</a></div>
							</li>
						</ul>
					</li> -->
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info">5</span>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

		<div class="profile-sidebar">
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">{{auth()->user()->name}}</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>

		<ul class="nav menu">
			<!-- Para que quede la pestaña seleccionada se ocupa la variable Request y el metodo is para saber en que url se encuentra -->
			<li class="{!!Request::is('admin')?'active':''!!}"><a href="{{url('admin')}}"><em class="fa fa-home fa-fw">&nbsp;</em> Inicio</a></li>
			<li class="{!!Request::is('*admin/perfil*')?'active':''!!}"><a href="{{url('admin/perfil')}}"><em class="fa fa-user-md fa-fw">&nbsp;</em> Perfil</a></li>
			<li class="{!!Request::is('*admin/clinica*')?'active':''!!}"><a href="{{url('admin/clinica')}}"><em class="fa fa-hospital-o fa-fw">&nbsp;</em> Clinica/Hospital</a></li>
			<li class="{!!Request::is('*admin/enfermedades*')?'active':''!!}"><a href="{{url('admin/enfermedades')}}"><em class="fa fa-medkit fa-fw">&nbsp;</em> Enfermedades</a></li>
			<li class="{!!Request::is('*admin/areas*')?'active':''!!}"><a href="{{url('admin/areas')}}"><em class="fa fa-sitemap fa-fw">&nbsp;</em> Areas Médicas</a></li>
			@if(Request::is('*admin/usuarios*'))
			<li class="parent ">
				<a data-toggle="collapse" href="#sub-item-1" class="" aria-expanded="true">
					<em class="fa fa-users fa-fw fa-minus">&nbsp;</em> 
					Usuarios 
					<span data-toggle="collapse" href="#sub-item-1" class="icon pull-right">
						<em class="fa fa-plus fa-minus"></em>
					</span>
				</a>
				<ul class="children collapse in" id="sub-item-1">
			@else
			<li class="parent ">
				<a data-toggle="collapse" href="#sub-item-1" class="collapsed" aria-expanded="false">
					<em class="fa fa-users fa-fw">&nbsp;</em> 
					Usuarios 
					<span data-toggle="collapse" href="#sub-item-1" class="icon pull-right collapsed">
						<em class="fa fa-plus"></em>
					</span>
				</a>
				<ul class="children collapse" id="sub-item-1">
			@endif
					<li><a class="{!!Request::is('*usuarios/admin*')?'active':''!!}" href="{{url('admin/usuarios/admin')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> Administradores
					</a></li>
					<li><a class="{!!Request::is('*usuarios/padmin*')?'active':''!!}" href="{{url('admin/usuarios/padmin')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> P. Administrativo
					</a></li>
					<li><a class="{!!Request::is('*usuarios/medico*')?'active':''!!}" href="{{url('admin/usuarios/medico')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> P. Médico
					</a></li>
				</ul>
			</li>
			<li>
				<form method="POST" action="{{route('logout')}}">
					{{csrf_field()}}
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<button type="submit" class=" btn-link">
						<em class="fa fa-power-off">&nbsp;</em> Cerrar Sesión
					</button>
				</form>				
			</li>
		</ul>
	</div><!--/.sidebar-->
	
	<div id="page-wrapper">
        <div id="page-inner">
        	<!-- Contenido  -->
        	<h4>Panel / <small>Administrador /@yield('title-panel')</small></h4>
        	@yield('contenido')
        	<!-- /Contenido -->
			</div class="col-sm-12">
	           <footer><p class="back-link">Copyright © <a href="#">CapCoinLab</a> {{date("Y")}}. All right reserved.</p></footer>
	        </div>
        </div>
    </div>
	<script src="{{asset('dashboard/js/jquery-1.11.1.min.js')}}"></script>
	<script src="{{asset('dashboard/js/bootstrap.min.js')}}"></script>	
	<script src="{{asset('dashboard/js/chart.min.js')}}"></script>
	<script src="{{asset('dashboard/js/chart-data.js')}}"></script>
	<script src="{{asset('dashboard/js/easypiechart.js')}}"></script>
	<script src="{{asset('dashboard/js/easypiechart-data.js')}}"></script>
	<script src="{{asset('dashboard/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('dashboard/js/custom.js')}}"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
	};
	</script>
	<!-- Bootstrap Select Script -->
	<script src="{{asset('dashboard/js/bootstrap-select.min.js')}}"></script>
	<!-- DATA TABLE SCRIPTS -->
    <script src="{{asset('dashboard/js/dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('dashboard/js/dataTables/dataTables.bootstrap.js')}}"></script>
    @include('datatable-script')
   <!--  <script>
        $("#reset").click(function(){
            @yield('campos')
        });
    </script> -->
    @yield('script')
		
</body>
</html>