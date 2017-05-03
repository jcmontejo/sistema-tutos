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
	
	<img src="img/dompdf/logo_left.jpg"  height="100"  align="center" />
	<img src="img/dompdf/logo_right.png"  height="100" align="right" />
	<br>
	<hr>
	<div id="second"> <!-- Datos generales -->
		<p align="center"><b>DEPARTAMENTO PSICOPEDAGÓGICO</b></p>
		<p align="center"><b>PROGRAMA DE TUTORÍAS</b></p>
	</div> <!-- Termina Datos Generales-->
	<br>
	<div id="second"> <!-- Datos campo -->
		<p align="center"><b>Datos de Generales</b></p>
		
		<p id="analisis"><b>Plantel:</b> {{$data->campus}}&nbsp;&nbsp;&nbsp;&nbsp;<b>Ciclo Escolar:</b> {{$data->school_cycle}}&nbsp;&nbsp;&nbsp;&nbsp;<b> Fecha de Elaboración:</b> {{$data->date}}&nbsp;&nbsp;&nbsp;&nbsp;</p>
		
	</div>	<!-- Termina Datos campo-->
	<br>
	<div class="container">
		<h3 id="title">PRESENTACIÓN</h3>
		<div class="container item">
			{!! $data->presentation!!}
		</div>
		<hr>
		<h3 id="title">OBJETIVO GENERAL</h3>
		<div class="container item">
			{!! $data->general_objective!!}
		</div>
		<hr>
		<h3 id="title">OBJETIVOS ESPECIFICOS</h3>
		<div class="container item">
			{!! $data->specific_objetives!!}
		</div>
		<hr>
		<h3 id="title">RELACIÓN DE ALUMNOS TUTORADOS Y DOCENTES</h3>
		<div class="container">
		<table> <!-- Tabla de datos de recepción-->
		<tr>
			<th id="cd">No.</th>
			<th id="cd">ALUMNO</th>
			<th id="cd">SEMESTRE</th>
			<th id="cd">DOCENTE</th>
		</tr>
		@foreach($items as $key=>$item)
		<?php
			$tutor = App\Models\Tutors::find($item->tutors_id);
		?>
		<tr>
			<td align="center">{{ ++$key }}</td>
			<td align="center">{!!$item->fullname!!}</td>
			<td align="center">{!!$item->grade!!}</td>
			<td align="center">{!!$tutor->fullname!!}</td>
		</tr>
		@endforeach
	</table> <!-- Finaliza la tabla de datos de recepción-->
	</div>
		<br>
		<br><br>
		<hr>
		<div class="container">
		<div class="form-group  col-xs-4">
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
	</div>
	
</body>
</html>