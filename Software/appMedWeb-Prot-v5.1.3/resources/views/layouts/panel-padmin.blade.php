<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MediWeb | P.Administrativo - @yield('title')</title>
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
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Menu de Navegación</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="{{url('padmin')}}"><img src="{{asset('dashboard/img/milogo.png')}}" class="img-responsive" style="width: 140px; margin-top: -16px;"></a>
				<!-- Menu para las notificaciones -->
				<ul class="nav navbar-top-links navbar-right">
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
			<li class="{!!Request::is('padmin')?'active':''!!}"><a href="{{url('padmin')}}"><em class="fa fa-home fa-fw">&nbsp;</em> Inicio</a></li>
			<li class="{!!Request::is('*padmin/perfil*')?'active':''!!}"><a href="{{url('padmin/perfil')}}"><em class="fa fa-user-md fa-fw">&nbsp;</em> Perfil</a></li>
			<li class="{!!Request::is('*padmin/citas*')?'active':''!!}"><a href="{{url('padmin/citas')}}"><em class="fa fa-calendar fa-fw">&nbsp;</em> Citas</a></li>
			<li class="{!!Request::is('*padmin/paciente*')?'active':''!!}"><a href="{{url('padmin/paciente')}}"><em class="fa fa-address-book-o fa-fw">&nbsp;</em> Pacientes</a></li>
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
        	<h4>Panel / <small>P. Administrativo /@yield('title-panel')</small></h4>
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
    @yield('script')
    @include('datatable-script')
   <!--  <script>
        $("#reset").click(function(){
            @yield('campos')
        });
    </script> -->
    
		
</body>
</html>