
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Example 2</title>
	<!--<style>
		<?php include(public_path().'/css/style.css');?>
	</style>-->
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
	<!-- Theme style -->
	<link href="{{ asset('/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />
	<style>
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
		h1{
			font-size: 20px;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<img src="{{ asset('img/dompdf/logo_left.jpg')}}"  height="100"  align="center" />
		<img src="{{ asset('img/dompdf/logo_right.png')}}"  height="100" align="right" />
		<br>
		<hr>
		<div class="row">
			<p>
				<h1 id="title">COLEGIO DE BACHILLERES DE CHIAPAS</h1>
			</p>
			<p>
				<h1 id="title">PLANTEL 13 TUXTLA ORIENTE</h1>
			</p>
			<p>
				<h1 id="title">DEPARTAMENTO PSICOPEDAGOGICO</h1>
			</p>
			<p>
				<h1 id="title">INFORME DEL PROGRAMA DE TUTORÍAS</h1>
			</p>
		</div>
		<hr>
		<div id="second"> <!-- Datos campo -->
			<p align="center"><b>Datos de Generales</b></p>

			<p id="analisis"><b>Plantel:</b> {{$data->campus}}&nbsp;&nbsp;&nbsp;&nbsp;<b>Alumnos Atendidos:</b> {{$data->students_attended}}&nbsp;&nbsp;&nbsp;&nbsp;<b>Semestre:</b> {{$data->semester}}&nbsp;&nbsp;&nbsp;&nbsp;<b>Turno:</b> {{$data->turn}}&nbsp;&nbsp;&nbsp;&nbsp;<b> Fecha de Elaboración:</b> {{$data->date}}&nbsp;&nbsp;&nbsp;&nbsp;</p>

		</div>	<!-- Termina Datos campo-->
		<hr>
		<br>
		<div id="second">
			<p align="center"><strong>PROBLEMATICA DETECTADA: {!!$data->problematic!!}</strong></p>
		</div>
		<hr>
		<br>
		<div id="second">
			<p align="center"><strong>OBJETIVO GENERAL: {!!$data->general_objective!!}</strong></p>
		</div>
		<hr>
		<br>
		<table> <!-- Tabla de datos de recepción-->
			<tr>
				<th id="cd">Nombre del alumno.</th>
				<th id="cd">Grado y Grupo</th>
				<th colspan="2" id="cd">Actividades Realizadas</th>
				<th id="cd">Resultados</th>
				<th id="cd">Observaciones</th>
			</tr>
			<tr>
				<td width="10%" align="center">{!!$data->students!!}</td>
				<td width="10%" align="center">{!!$data->grade_and_group!!}</td>
				<td width="10%" colspan="2" align="center">{!!$data->activities!!}</td>
				<td width="30%" align="center">{!!$data->results!!}</td>
				<td width="30%" align="center">{!!$data->observations!!}</td>
			</tr>
		</table> <!-- Finaliza la tabla de datos de recepción-->
		<div class="container">
			<hr>
			<br>
			<div id="second">
			<p align="center"><strong>SUGERENCIAS Y PROPUESTAS: {!!$data->suggestions_and_proposals!!}</strong></p>
			</div>
			<hr>
			<br>
			<div class="form-group  col-xs-6">
				{!! $data->vobo!!}</strong></label>
			</div>
		</div>
	</div>
</body>
</html>