<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Crédito Simple</title>
  <link rel="stylesheet" href="{{asset('css/pdf/style.css')}}" media="all" />
  <link href="{{ asset('/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
  <header class="clearfix">
    <div id="logo">
      <img src="{{asset('img/pdf/logo.png')}}">
    </div>
    <div id="company">
     <h2 class="name">SOLUCIÓN Y CRECIMIENTO EMPRESARIAL, S.A. DE C.V.</h2>
     <div>Av. Central y 5a. Poniente #119, Villaflores, Chiapas C.P. 30470</div>
     <div>(965) 652-0397</div>
     <div><a href="#">contacto@sc-empresarial.com.mx</a></div>
   </div>
 </div>
</header>
<main>
  <div class="clearfix">
   <strong><h2 class="name" style="text-align: center">SOLUCITUD DE CRÉDITO INDIVIADUAL</h2></strong>
 </div>
 <div id="details" class="clearfix">
  <div id="client">
    <div class="to">DETALLES DEL SOLICITANTE:</div>
    <h2 class="name">John Doe</h2>
    <div class="address">796 Silver Harbour, TX 79273, US</div>
    <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>
  </div>
</div> 
<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Nombres y apellidos</th>
      <th>Crédito anterior</th>
      <th>Deudas con otras financieras</th>
      <th>Actividad economica</th>
      <th>Monto solicitado</th>
      <th>Monto autorizado</th>
      <th>Garantía líquida</th>
      <th>firma</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td><strong>Solicitante: </strong>Wilfrido Enrique Ramirez Meza</td>
      <td>No</td>
      <td>Si</td>
      <td>Solución y Crecimiento empresarial</td>
      <td>15000</td>
      <td>10000</td>
      <td>Aval</td>
      <td></td>
    </tr>
    <tr>
      <td>2</td>
      <td><strong>Conyugue: </strong>Wilfrido Enrique Ramirez Meza</td>
      <td>No</td>
      <td>Si</td>
      <td>Solución y Crecimiento empresarial</td>
      <td>15000</td>
      <td>10000</td>
      <td>Aval</td>
      <td></td>
    </tr>
    <tr>
      <td>3</td>
      <td><strong>Aval: </strong>Wilfrido Enrique Ramirez Meza</td>
      <td>No</td>
      <td>Si</td>
      <td>Solución y Crecimiento empresarial</td>
      <td>15000</td>
      <td>10000</td>
      <td>Aval</td>
      <td></td>
    </tr>
  </tbody>
</table>
<br>
<div class="part1">
  <p>
    TIPO DE GARANTÍA: <strong>Prendaria</strong>
  </p>
  <p>
    VALOR DE LA GARANTÍA: <strong>3500</strong>
  </p>
  <p>
    SECUENCIA: 
  </p>
  <p>
    PLAZO: <strong>180 día</strong>
  </p>
  <p>
    FRECUENCIA DE PAGO: <strong>Diario</strong>
  </p>
  <p>
    INTERES: <strong>0.08 %</strong>
  </p>
  <p>
    ASESOR DE CRÉDITO: <strong>Rubén Sol Gómez</strong>
  </p>
</div>
<div class="part2">
  <div>
    <p><strong>Observaciones:</strong>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium quos in eligendi doloremque culpa quia dolorum perferendis enim earum aut. Culpa amet ipsa tempore eius id repellendus laudantium nobis iure? 
    </p>
  </div>
  <br>
  <div>
    <p><strong>Solicitud levantada:</strong></p>
  </div>
  <br>
  <div>
    <p><strong>Calificación:</strong></p>
  </div>
</div>
</main>
</body>
</html>