<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{$pacientes->nombres}} {{$pacientes->apellidos}}</title>
    <link rel="stylesheet" href="assets/css/material-dashboard.css" media="all" />
    <link rel="stylesheet" href="assets/css/style_pdf.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="http://www.clinicadentalnaves.com/img/logoClinicaDentalNaves.png">
      </div>
      <h1>FICHA PERSONAL DEL PACIENTE</h1>
      <div id="company" class="clearfix">
        <div id="img_perfil">
        <img src="assets/img/perfiles/{{$pacientes->avatar}}">
      </div>
      </div>
      <div id="project">
        <div><span>RUT</span>{{$pacientes->rut}}</div>
        <div><span>PACIENTE</span> {{$pacientes->nombres}} {{$pacientes->apellidos}}</div>
        <div><span>GÉNERO</span> {{$pacientes->genero}}</div>
        <div><span>PROFESIÓN/OFICIO</span> {{$pacientes->titulo}}</div>
        <div><span>EMAIL</span>  <a href="mailto:john@example.com">{{$pacientes->email}}</a></div>
        <div><span>DIRECCIÓN</span> {{$pacientes->direccion}}</div>
        <div><span>TELÉFONO</span> {{$pacientes->telefono}}</div>
        <div><span>EDAD</span> {{$edad}}</div>
      </div>
    </header>
    <main>
      <table>
        <tbody>
          <tr>
            <td colspan="4">TIPO DE SANGRE</td>
            <td class="total">{{$pacientes->sangre}}</td>
          </tr>
          <tr>
            <td colspan="4">VIH</td>
            <td class="total">{{$pacientes->vih}}</td>
          </tr>
          <tr>
            <td colspan="4">PESO</td>
            <td class="total">{{$pacientes->peso}} Kg.</td>
          </tr>
          <tr>
            <td colspan="4">ESTATURA</td>
            <td class="total">{{$pacientes->altura}} Cm.</td>
          </tr>
          <tr>
            <td colspan="4">ALERGIAS</td>
            <td class="total">{{$pacientes->alergia}}</td>
          </tr>
          <tr>
            <td colspan="4">MEDICAMENTO ACTUAL</td>
            <td class="total">{{$pacientes->medicamento_actual}}</td>
          </tr>
          <tr>
            <td colspan="4">ENFERMEDAD</td>
            <td class="total">{{$pacientes->enfermedad}}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>Advertencia:</div>
        <div class="notice" align="justify">La información que se muestra en esta ficha clínica, de los estudios y demás documentos donde se registren procedimientos y tratamientos a los que fue sometido el paciente <b>{{$pacientes->nombres}} {{$pacientes->apellidos}}</b>, es considerada como <b>información sensible</b> y por tanto tiene la calidad de reservada. Quienes no estén relacionados directamente con la atención no tendrán acceso a la información, salvo las excepciones legales.</div>
        <br>
        <br>
        <br>
        <div>Éste documento fue descargado por:</div>
        <div class="notice">{{Auth::User()->nombres}} {{Auth::User()->apellidos}}</div>
      </div>

      <div id="fecha">
        {{ $fecha }}
      </div>
    </main>
    <footer>
      Documento generado por el sistema de reservas y gestión administrativa doctorClick, Todos los derechos reservados &copy; 2018 Serviline Limitada.
    </footer>
  </body>
</html>