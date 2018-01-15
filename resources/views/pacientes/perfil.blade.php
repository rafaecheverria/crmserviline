@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col s12 m4">
            {!! Form::open(['method' => 'POST', 'files' => true,'id' => 'avatarForm']); !!}
            <div class="file-field input-field">
                {!! Form::text('id', $paciente->id,['id' => 'id', 'hidden' => true]); !!} 
              {!! Form::file('avatar', ['id' => 'avatarInput', 'class' => 'hidden']); !!}         
              <div class="file-path-wrapper">
                <input class="file-path validate" name="avatar" hidden="true" placeholder="Selecciona una imagen">     
              </div>
            </div>
            {!! Form::close() !!} 
          </div>

            <div class="col-md-3">
                <a href="#">
                    <img src="/assets/img/perfiles/{{ $paciente->avatar }}" alt="Thumbnail Image" class="img-rounded img-responsive avatarImage">
                </a>
                <button class="btn btn-default">Top Right Notification</button>
            </div>

            <div class="col-md-4">
               <div class="card card-login card-hidden">
                    <div class="card-header text-center" data-background-color="rose">
                           <h4 class="card-title">INFORMACIÓN BÁSICA</h4>
                    </div>
                    <div class="card-content">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <h6><b>Rut:</b></h6>
                                    </td>
                                    <td>
                                        <h4>{!! $paciente->rut !!}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6><b>Paciente:</b></h6>
                                    </td>
                                    <td>
                                        <h4>{!! $paciente->nombres !!} {!! $paciente->apellidos !!}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6><b>Email:</b></h6>
                                    </td>
                                    <td>
                                        <h4>{!! $paciente->email !!}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6><b>Teléfono:</b></h6>
                                    </td>
                                    <td>
                                        <h4>{!! $paciente->telefono !!}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6><b>Género:</b></h6>
                                    </td>
                                    <td>
                                        <h4>{!! $paciente->genero !!}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6><b>Dirección:</b></h6>
                                    </td>
                                    <td>
                                        <h4>{!! $paciente->direccion !!}</h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>        
            </div>

            <div class="col-md-4">
               <div class="card card-login card-hidden">
                    <div class="card-header text-center" data-background-color="rose">
                           <h4 class="card-title">ANTECEDENTES PERSONALES</h4>
                    </div>
                    <div class="card-content">
                        <table class="table" border="1">
                            <tbody>
                                <tr>
                                    <td>
                                        <h6><b>Sangre:</b></h6>
                                    </td>
                                    <td>
                                        <h4>{!! $paciente->sangre !!}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6><b>Vih:</b></h6>
                                    </td>
                                    <td>
                                        <h4>{!! $paciente->vih !!}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6><b>Peso:</b></h6>
                                    </td>
                                    <td>
                                        <h4>{!! $paciente->peso !!}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6><b>Estatura:</b></h6>
                                    </td>
                                    <td>
                                        <h4>{!! $paciente->altura !!}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6><b>Alergias:</b></h6>
                                    </td>
                                    <td>
                                        <h4>{!! $paciente->alergia !!}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6><b>Medicamento Actual:</b></h6>
                                    </td>
                                    <td>
                                        <h4>{!! $paciente->medicamento_actual !!}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6><b>Enfermedad:</b></h6>
                                    </td>
                                    <td>
                                         <h4>{!! $paciente->enfermedad !!}</h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>        
            </div>
        </div>
    </div>
</div>
@endsection