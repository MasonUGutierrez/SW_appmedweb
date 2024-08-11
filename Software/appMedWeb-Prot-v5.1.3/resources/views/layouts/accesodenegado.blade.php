<!DOCTYPE html>
<html lang="es-ES">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MediWeb.com - Acceso Denegado</title>

	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
    <link rel="stylesheet" type="text/css" href="{{asset('landing/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('landing/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('landing/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/styles.css')}}">
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
	<div class="container">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<h1 class="panel-title" style="font-size: 30px;"> <strong>¡ Acceso Denegado !</strong></h1>
			</div>
			<div class="panel-container">
				<div class="panel-body">
					<p> No cuentas con los permisos necesarios para esta area. Por favor, inicie sesión o revise sus credenciales</p>
				</div>
			</div>
			
			<div class="panel-footer">
				<button class="btn btn-danger btn-block" onclick="btnVolver()">Atras</button>
			</div>
		</div>		
	</div>
    </script>
    <script src="{{asset('landing/js/jquery.min.js')}}"></script>
    <script src="{{asset('landing/js/jquery.easing.min.js')}}"></script>

    <script src="{{asset('landing/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('landing/js/custom.js')}}"></script>
    <script type="text/javascript">
    	function btnVolver()
    	{
    		history.back();
    		// location.replace("{{url('/')}}");
    	}
    </script>
</body>
</html>