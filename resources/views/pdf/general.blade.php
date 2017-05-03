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
		<p align="center"><b>INFORME GENERAL DE TUTORÍAS</b></p>
	</div> <!-- Termina Datos Generales-->
	<br>
	<div id="second"> <!-- Datos campo -->
		<p align="center"><b>Datos de Generales</b></p>
		
		<p id="analisis"><b>Plantel:</b> {{$data->campus}}&nbsp;&nbsp;&nbsp;&nbsp;<b>Alumnos Atendidos:</b> {{$data->students_attended}}&nbsp;&nbsp;&nbsp;&nbsp;<b>Ciclo Escolar:</b> {{$data->school_cycle}}&nbsp;&nbsp;&nbsp;&nbsp;<b>Turno:</b> {{$data->turn}}&nbsp;&nbsp;&nbsp;&nbsp;<b> Fecha de Elaboración:</b> {{$data->date}}&nbsp;&nbsp;&nbsp;&nbsp;</p>
		
	</div>	<!-- Termina Datos campo-->
	<div id="second">
		<p align="center"><strong>OBJETIVO GENERAL: {!!$data->general_objective!!}</strong></p>
	</div>
	<br>
	<table> <!-- Tabla de datos de recepción-->
		<tr>
			<th id="cd">No.</th>
			<th id="cd">TEMA</th>
			<th id="cd">ACTIVIDAD</th>
			<th id="cd">OBJETIVO</th>
			<th id="cd">RECURSOS MATERIALES Y / O HUMANOS</th>
			<th id="cd">CRONOGRAMA</th>
			<th id="cd">EVALUACIÓN Y SEGUIMIENTO</th>
		</tr>
		@foreach($items as $item)
		<tr>
			<td align="center">{!!$item->id!!}</td>
			<td align="center">{!!$item->theme!!}</td>
			<td align="center">{!!$item->activity!!}</td>
			<td align="center">{!!$item->objective!!}</td>
			<td align="center">{!!$item->resources!!}</td>
			<td align="center">{!!$item->schedule!!}</td>
			<td align="center">{!!$item->evaluation_and_follow!!}</td>
		</tr>
		@endforeach
	</table> <!-- Finaliza la tabla de datos de recepción-->

	<div class="container">
		<div class="form-group  col-xs-6">
			<label for=""><strong>Elaborado por:</strong></label>
			<br><br><br>
			<hr id="firma">
			<p>
				{!! $data->elaboration!!}
			</p>
		</div>
		<div class="form-group  col-xs-6">
			<label for=""><strong>Vo. Bo.</strong></label>
			<br><br><br>
			<hr id="firma">
			<p>
				{!! $data->vobo!!}
			</p>
		</div>
	</div>
</body>
</html>