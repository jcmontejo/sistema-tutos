<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	
	<title></title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
	<!-- Theme style -->
	<link href="{{ asset('/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />
	<style>
		#second{
			border: 3px solid #a1a1a1;
			/*padding: 10px 40px; 
			width: 300px;*/ 
			border-radius: 26px;
		}
		#recepcion {
			text-align: center;
		} 
		#analisis {
			text-align: center;
		} 
		
		#cd{
			border: 1px solid #dddddd;
			text-align: center;
			padding: 8px;
		}

		.page-break{
			page-break-after: always;
		}
		
		/*table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			width: 100%;
		}*/
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td, th {
			border: 2px solid #dddddd;
			text-align: left;
			padding: 4px;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
		}
		#title{
			text-align: center;
		}
		hr {
			height: 5px;
			color: #34495D;
			background-color: #34495D;
			border: none;
		}
		.item{
			border-style: solid;
			border-color: black;
		}
		#firma{
			height: 1px;
			border: 0;
			background-color: black;
		}
	</style>
	
</head>
<body>

	<img src="img/dompdf/logo_left.jpg" height="100" align="center" />
	<img src="img/dompdf/logo_right.png"  height="100" align="right" />
	<br>
	<hr>
	<div id="second"> <!-- Datos generales -->
		<p align="center"><b>COLEGIO DE BACHILLERES DE CHIAPAS</b></p>
		<p align="center"><b>DEPARTAMENTO PSICOPEDAGÓGICO</b></p>
		<p align="center"><b>ACTA DE CONFORMACIÓN</b></p>
	</div> <!-- Termina Datos Generales-->
	<br>
	<div class="container">
		<div class="form-group  col-xs-12">
			<p>
				{!! $data->body!!}
			</p>
		</div>
	</div>
</body>
</html>