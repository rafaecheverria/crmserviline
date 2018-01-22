@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="header text-center">
        <h3 class="title">FullCalendar.io</h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-calendar">
                <div class="card-content" class="ps-child">
                    <div id="citas_medicas"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- notice modal -->
<div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header-primary">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h6>INGRESAR UNA CITA</h6>
            </div>
            <div class="modal-body">
                <div class="row">
        <div class="col-md-12">
            <form id="form_evento">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">FECHA</label>
                        <input id="fecha_inicio" name="fecha_inicio" type="text" class="form-control" readonly="true" />                    
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">HORA</label>
                        <input id="hora_inicio" name="hora_inicio" type="text" class="form-control" />                    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"> 
                    <div class="form-group">
                      <label class="control-label">DOCTOR</label>
                      <select id="doctor" name="doctor" class="selectpicker" data-style="select-with-transition">
                            <option value="">-- SELECCIONE UN DOCTOR --</option>
                             @foreach($doctores as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->nombres }} {{ $doctor->apellidos }}</option>
                            @endforeach

                      </select>
                    </div>
                </div>
                <div class="col-md-6"> 
                    <div class="form-group">
                      <label class="control-label">PACIENTE</label>
                      <select id="doctor" name="doctor" class="selectpicker" data-style="select-with-transition">
                            <option value="">-- SELECCIONE UN PACIENTE --</option>
                             @foreach($pacientes as $paciente)
                                <option value="{{ $paciente->id }}">{{ $paciente->apellidos }} {{ $paciente->nombres }}</option>
                            @endforeach

                      </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"> 
                    <div class="form-group">
                        <label class="control-label">OBSERVACIÓN</label>
                        <input id="hora_inicio" name="hora_inicio" type="text" class="form-control" />                    
                    </div>
                </div>
            </div>
          </form>
        </div>
    </div>
            </div>
            <div class="modal-footer text-center">
                <a href="#" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</a>
                <a href="#" id="update_antecedentes_paciente" class="btn btn-primary pull-right">Guardar</a>
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->