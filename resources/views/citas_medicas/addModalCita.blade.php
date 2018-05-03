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
                        <form id="form_cita">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">FECHA</label>
                                    <input id="fecha_inicio" name="fecha_inicio" type="text" class="form-control datepicker" placeholder="dd-mm-aaaa" />                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">HORA INICIO</label>
                                    <input id="hora_inicio" name="hora_inicio" type="text" class="form-control timepicker" placeholder="00:00" />                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">HORA FIN</label>
                                    <input id="hora_fin" name="hora_fin" type="text" class="form-control timepicker" placeholder="00:00" />       
                                </div>
                            </div>
                        </div>
                        @role('doctor')
                        <input id="doctor_id_add" name="doctor_id" value="{{Auth::User()->id}}" hidden="true" />
                        <div class="row">
                            <div class="col-md-12"> 
                                <div class="form-group">
                                  <label class="control-label">ESPECIALIDAD</label>
                                  <select id="speciality_id_add" name="speciality_id" class="selectpicker show-tick" data-dropup-auto="false" data-size="5" data-live-search="true" data-style="select-with-transition">
                                        <option value="">-- Seleccione --</option>
                                         @foreach($especialidades as $especialidad)
                                            <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                                        @endforeach
                                  </select>
                                </div>
                            </div>
                        </div>
                        @else
                        @permission('leer-especialidades')
                        <div class="row">
                            <div class="col-md-6"> 
                                <div class="form-group">
                                  <label class="control-label">ESPECIALIDAD</label>
                                  <select id="speciality_id" name="speciality_id" class="selectpicker show-tick" data-dropup-auto="false" data-size="5" data-live-search="true" data-style="select-with-transition">
                                        <option value="">-- Seleccione --</option>
                                         @foreach($especialidades as $especialidad)
                                            <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                                        @endforeach
                                  </select>
                                </div>
                            </div>
                            @endpermission
                            @permission('leer-doctores')
                            <div class="col-md-6"> 
                                <div class="form-group">
                                  <label class="control-label">DOCTOR</label>
                                  <select id="doctor_id" data-live-search="true" name="doctor_id" class="selectpicker show-tick" data-dropup-auto="false" data-size="5" data-style="select-with-transition">
                                        <option value="0">-- Seleccione --</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        @endpermission
                        @endrole
                        @permission('leer-pacientes')
                        <div class="row">
                            <div class="col-md-12"> 
                                <div class="form-group">
                                  <label class="control-label">PACIENTE</label>
                                  <select id="paciente_id" name="paciente_id" class="selectpicker show-tick" data-dropup-auto="false" data-size="5" data-live-search="true" data-live-search="true" data-style="select-with-transition">
                                        <option value="">-- Seleccione --</option>
                                         @foreach($pacientes as $paciente)
                                            <option value="{{ $paciente->id }}">{{ $paciente->apellidos }} {{ $paciente->nombres }}</option>
                                        @endforeach
                                  </select>
                                </div>
                            </div>
                        </div>
                        @endpermission
                        <div class="row">
                            <div class="col-md-12"> 
                                <div class="form-group">
                                    <label class="control-label">OBSERVACIÓN</label>
                                    <input id="descripcion" name="descripcion" type="text" class="form-control" />      
                                </div>
                            </div>
                        </div>
                       </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <a href="#" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</a>
                <a href="#" id="guardar_cita" class="btn btn-primary pull-right">Guardar</a>
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->
