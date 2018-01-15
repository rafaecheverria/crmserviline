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
            <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{!! $paciente->nombres !!} {!! $paciente->apellidos !!}
                                    </h4>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <ul class="nav nav-pills nav-pills-icons nav-pills-primary nav-stacked" role="tablist">
                                                <li class="active">
                                                    <a href="#dashboard-2" role="tab" data-toggle="tab">
                                                        <i class="material-icons">folder_open</i> Información Básica
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#schedule-2" role="tab" data-toggle="tab">
                                                        <i class="material-icons">content_paste</i> Antecedentes Personales
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="dashboard-2">
                                                    <table>
                                                    <tr>
                                                        <td>
                                                            <h6><b class="text-default">Rut:</b> {!! $paciente->rut !!}</h6>
                                                            <h6><b class="text-default">Paciente:</b> {!! $paciente->nombres !!} {!! $paciente->apellidos !!}</h6>
                                                            <h6><b class="text-default">Email:</b> {!! $paciente->email !!}</h6>
                                                            <h6><b class="text-default">Teléfono:</b> {!! $paciente->telefono !!}</h6>
                                                            <h6><b class="text-default">Género:</b> {!! $paciente->genero !!}</h6>
                                                            <h6><b class="text-default">Dirección:</b> {!! $paciente->direccion !!}</h6>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                </div>
                                                <div class="tab-pane" id="schedule-2">
                                                    <table>
                                                    <tr>
                                                        <td>
                                                            <h6><b class="text-default">Tipo de sangre:</b> {!! $paciente->sangre !!}</h6>
                                                            <h6><b class="text-default">Vih:</b> {!! $paciente->vih !!}</h6>
                                                            <h6><b class="text-default">Peso:</b> {!! $paciente->peso !!}</h6>
                                                            <h6><b class="text-default">altura:</b> {!! $paciente->altura !!}</h6>
                                                            <h6><b class="text-default">Alergia:</b> {!! $paciente->alergia !!}</h6>
                                                            <h6><b class="text-default">Medicamento:</b> {!! $paciente->medicamento_actual !!}</h6>
                                                            <h6><b class="text-default">Enfermedad:</b> {!! $paciente->enfermedad !!}</h6>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
    </div>
</div>
@endsection