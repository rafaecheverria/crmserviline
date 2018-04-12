@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col s12 m4">
            {!! Form::open(['method' => 'POST', 'files' => true,'id' => 'avatarForm']); !!}
            <div class="file-field input-field">
                <div id="id_paciente"></div>
                {!! Form::text('id', $paciente->id,['id' => 'id', 'hidden' => true]); !!} 
                {!! Form::file('avatar', ['id' => 'avatarInput', 'class' => 'hidden']); !!}         
              <div class="file-path-wrapper">
                <input class="file-path validate" name="avatar" hidden="true" placeholder="Selecciona una imagen">     
              </div>
            </div>
            {!! Form::close() !!} 
          </div>

          <div class="col-md-5">
               <div class="card card-login card-hidden">
                    <div class="card-header text-center" data-background-color="rose">
                           <h4 class="card-title">INFORMACIÓN BÁSICA</h4>
                    </div>
                    <div class="card-content">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th class="text-right">Rut:</th>
                                    <td>{!! $paciente->rut !!}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Paciente:</th>
                                    <td>{!! $paciente->nombres !!} {!! $paciente->apellidos !!}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Edad:</th>
                                    <td>{!! $paciente->edad !!}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Email:</th>
                                    <td>{!! $paciente->email !!}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Teléfono:</th>
                                    <td>{!! $paciente->telefono !!}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Género:</th>
                                    <td>{!! $paciente->genero !!}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Dirección:</th>
                                    <td>{!! $paciente->direccion !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>        
            </div>

            <div class="col-md-2" align="center">
                <a href="#">
                    <img src="/assets/img/perfiles/{{ $paciente->avatar }}" alt="Thumbnail Image" class="img-rounded img-responsive avatarImage">
                </a>
            </div>

          <div class="col-md-5">
               <div class="card card-login card-hidden">
                    <div class="card-header text-center" data-background-color="rose">
                           <h4 class="card-title">ANTECEDENTES PERSONALES</h4>
                    </div>
                    <div class="card-content">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th width="10" class="text-right">Sangre:</th>
                                    <td>{!! $paciente->sangre !!}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Vih:</th>
                                    <td>{!! $paciente->vih !!}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Peso:</th>
                                    <td>{!! $paciente->peso !!}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Estatura:</th>
                                    <td>{!! $paciente->altura !!}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Alergia:</th>
                                    <td>{!! $paciente->alergia !!}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Medicamento:</th>
                                    <td>{!! $paciente->medicamento_actual !!}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Enfermedad:</th>
                                    <td>{!! $paciente->enfermedad !!}</td>
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