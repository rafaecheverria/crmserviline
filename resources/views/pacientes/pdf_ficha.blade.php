<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 2</title>
    <link rel="stylesheet" href="assets/css/material-dashboard.css" media="all" />
    
    <link rel="stylesheet" href="assets/css/style_pdf.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="assets/img/perfiles/{{$pacientes->avatar}}">
      </div>
      <div id="company">
        <h2 class="name"> {{$pacientes->nombres}} {{$pacientes->apellidos}}</h2>
        <div>Rut                : {{$pacientes->rut}}</div>
        <div>Edad: {{$edad}}</div>
        <div>Dirección          : {{$pacientes->direccion}}</div>
        <div>Teléfono           : {{$pacientes->telefono}}</div>
        <div><a href="mailto:company@example.com">{{$pacientes->email}}</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="row"><p class="title texto">Aviso Importante:</p></div>
      <div id="row"><p class="texto" align="justify">La información que se muestra en esta ficha clínica, de los estudios y demás documentos donde se registren procedimientos y tratamientos a los que fue sometido el paciente <b>{{$pacientes->nombres}} {{$pacientes->apellidos}}</b>, es considerada como <b>información sensible</b> y por tanto tiene la calidad de reservada. Quienes no estén relacionados directamente con la atención no tendrán acceso a la información, salvo las excepciones legales.
</p></div>
      <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td class="no">01</td>
            <td class="desc"><h3>TIPO DE SANGRE</h3>{{$pacientes->sangre}}</td>
          </tr>
          <tr>
            <td class="no">02</td>
            <td class="desc"><h3>VIH</h3>{{$pacientes->vih}}</td>
          </tr>
          <tr>
            <td class="no">03</td>
            <td class="desc"><h3>PESO</h3>{{$pacientes->peso}} Kg.</td>
          </tr>
          <tr>
            <td class="no">04</td>
            <td class="desc"><h3>ESTATURA</h3>{{$pacientes->altura}} Cm.</td>
          </tr>
          <tr>
            <td class="no">05</td>
            <td class="desc"><h3>ALERGIAS</h3>{{$pacientes->alergia}}</td>
          </tr>
          <tr>
            <td class="no">06</td>
            <td class="desc"><h3>MEDICAMENTO ACTUAL</h3>{{$pacientes->medicamento_actual}}</td>
          </tr>
          <tr>
            <td class="no">07</td>
            <td class="desc"><h3>ENFERMEDAD</h3>{{$pacientes->enfermedad}}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>Descargado por:</div>
        <div class="notice">{{Auth::User()->nombres}} {{Auth::User()->apellidos}}</div>
      </div>
    </main>
    <footer>
      Documento generado por el sistema de reservas y gestión administrativa doctorClick.
    </footer>
  </body>
</html>