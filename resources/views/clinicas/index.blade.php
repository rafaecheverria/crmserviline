@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="header text-center">
        <h3 class="title">CLINICA</h3>
    </div>


        <div class="col-md-6">
          <div class="card">
              <div class="modal-header-primary">
                <h6>CLÍNICA</h6>
            </div>
              <div class="card-content">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">NOMBRE</label>
                                <input id="fecha_inicio" name="fecha_inicio" type="text" class="form-control" />                    
                            </div>
                            </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">TELÉFONO</label>
                                <input id="hora_inicio" name="hora_inicio" type="text" class="form-control" />                    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label class="control-label">EMAIL</label>
                                <input id="hora_inicio" name="hora_inicio" type="text" class="form-control" /> 
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label class="control-label">DIRECCIÓN</label>
                                <input id="hora_inicio" name="hora_inicio" type="text" class="form-control" /> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label class="control-label">REGIÓN</label>
                                <input id="hora_inicio" name="hora_inicio" type="text" class="form-control" />                    
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label class="control-label">CIUDAD</label>
                                <input id="hora_inicio" name="hora_inicio" type="text" class="form-control" />                    
                            </div>
                        </div>
                    </div>
                </form>
              </div>
              <div class="card-footer">
                    <a href="#" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</a>
                    <a href="#" id="update_antecedentes_paciente" class="btn btn-primary pull-right">Guardar</a>
                </div>
          </div>
        </div>
        

</div>
@endsection