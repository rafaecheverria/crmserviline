<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{$paciente->nombres}} {{$paciente->apellidos}}</title>
    <link rel="stylesheet" href="assets/css/material-dashboard.css" media="all" />
    <link rel="stylesheet" href="assets/css/style_pdf.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="http://www.clinicadentalnaves.com/img/logoClinicaDentalNaves.png">
      </div>
      <h1>EXPEDIENTE CLÍNICO DEL PACIENTE</h1>
      <div id="company" class="clearfix">
        <div id="img_perfil">
        <img src="assets/img/perfiles/{{$paciente->avatar}}">
      </div>
      </div>
      <div id="project">
        <div><span>RUT</span>{{$paciente->rut}}</div>
        <div><span>PACIENTE</span> {{$paciente->nombres}} {{$paciente->apellidos}}</div>
        <div><span>GÉNERO</span> {{$paciente->genero}}</div>
        <div><span>PROFESIÓN/OFICIO</span> {{$paciente->titulo}}</div>
        <div><span>EMAIL</span>  <a href="mailto:john@example.com">{{$paciente->email}}</a></div>
        <div><span>DIRECCIÓN</span> {{$paciente->direccion}}</div>
        <div><span>TELÉFONO</span> {{$paciente->telefono}}</div>
        <div><span>EDAD</span> {{$edad}}</div>
      </div>
    </header>
    <main>
      @foreach($query_paciente as $query)
      <table>
        <tbody>
          <tr>
            <td colspan="2">{{Date::parse($query->fecha_inicio)->toFormattedDateString()}}</td>
          </tr>
          <tr>
            <td colspan="4">Síntomas</td>
            <td class="total">{{$query->sintomas}}</td>
          </tr>
          <tr>
            <td colspan="4">Exámenes</td>
            <td class="total">{{$query->examenes}}</td>
          </tr>
          <tr>
            <td colspan="4">Tratamiento</td>
            <td class="total">{{$query->tratamiento}}</td>
          </tr>
          <tr>
            <td colspan="4">Observaciones</td>
            <td class="total">{{$query->observaciones}}</td>
          </tr>
        </tbody>
      </table>
      <div class="divider"></div>
       @endforeach
      <div id="notices">
        <div>Advertencia:</div>
        <div class="notice" align="justify">La información que se muestra en esta ficha clínica, de los estudios y demás documentos donde se registren procedimientos y tratamientos a los que fue sometido el paciente <b>{{$paciente->nombres}} {{$paciente->apellidos}}</b>, es considerada como <b>información sensible</b> y por tanto tiene la calidad de reservada. Quienes no estén relacionados directamente con la atención no tendrán acceso a la información, salvo las excepciones legales.</div>
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