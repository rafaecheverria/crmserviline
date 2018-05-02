            <form>
                <input id="id_ver_cita" hidden="true" />
                <div class="row sinpadding">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">FECHA</label>
                            <input id="fecha_inicio_ver" readonly="true" type="text" class="form-control datepicker" 
                            />                    
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">HORA INICIO</label>
                            <input id="hora_inicio_ver" readonly="true" type="text" class="form-control timepicker" />                    
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">HORA FIN</label>
                            <input id="hora_fin_ver" readonly="true" type="text" class="form-control timepicker" />                   
                        </div>
                    </div>
                </div>
                    
                    <div class="row">
                        <div class="col-md-6"> 
                            <div class="form-group">
                              <label class="control-label">ESPECIALIDAD</label>
                              <select id="speciality_id_ver" disabled="true" class="form-control" data-style="select-with-transition">
                                    <option value="">-- Seleccione --</option>
                                     @foreach($especialidades as $especialidad)
                                        <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                                    @endforeach
                              </select>
                            </div>
                        </div>
                
                
                        <div class="col-md-6"> 
                            <div class="form-group">
                              <label class="control-label">DOCTOR</label>
                              <select id="doctor_id_ver" disabled="true" class="form-control" data-style="select-with-transition">
                                   
                              </select>
                            </div>
                        </div>
                    </div>
         
                    <div class="row">
                        <div class="col-md-12"> 
                            <div class="form-group">
                              <label class="control-label">PACIENTE</label>
                              <select id="paciente_id_ver" disabled="true"  class="form-control" data-style="select-with-transition">
                                    <option value="">-- Seleccione --</option>
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
                            <input id="descripcion_ver" readonly="true"  type="text" class="form-control" />      
                        </div>
                    </div>
                </div>
            </form>


<!-- end notice modal -->