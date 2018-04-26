<div class="col-md-12">
    <div class="row">
        <div class="col-md-8">
            <div class="tab-content">
                <div class="tab-pane active" id="1">
                    <form class="form" id="form_editar_paciente">
                        <input type="text" name="id" id="id_paciente" hidden="true">
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">NOMBRES:</label>
                                    <input type="text" class="form-control" id="nombres_e" name="nombres_e">
                                </div>
                            </div>
                        </div>
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">APELLIDOS:</label>
                                    <input type="text" class="form-control" id="apellidos_e" name="apellidos_e">
                                </div>
                            </div>
                        </div>
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">NACIMIENTO:</label>
                                    <input type="text" class="form-control datepicker" id="nacimiento_e" name="nacimiento_e">
                                </div>
                            </div>
                        </div>
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">EMAIL:</label>
                                    <input type="email" class="form-control" id="email_e" name="email_e">
                                </div>
                            </div>
                        </div>
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">TELÉFONO:</label>
                                    <input type="text" class="form-control" id="telefono_e" name="telefono_e">
                                </div>
                            </div>
                        </div>
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">DIRECCIÓN:</label>
                                    <input type="text" class="form-control" id="direccion_e" name="direccion_e">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="genero_e" value="masculino">MASCULINO
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="genero_e" value="femenino">FEMENINO
                                        </label>
                                    </div>
                                </div>
                            </div>
                    </div>
                <div class="tab-pane" id="2">
                        <div class="row sinpadding">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">SANGRE</label>
                                    <select id="sangre_e" name="sangre_e" class="form-control" data-style="select-with-transition">
                                        <option value="">-- SELECCIONE --</option>
                                        <option value="ARH+">A RH+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row sinpadding">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">VIH</label>
                                    <select id="vih_e" name="vih_e" class="form-control" data-style="select-with-transition">
                                        <option value="">-- SELECCIONE --</option>
                                        <option value="negativo">Negativo </option>
                                        <option value="positivo">Positivo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">PESO</label>
                                    <input id="peso_e" name="peso_e" type="text" class="form-control" />                    
                                </div>
                            </div>
                        </div>
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">ALTURA</label>
                                    <input id="altura_e" name="altura_e" type="text" class="form-control" />                    
                                </div>
                            </div>
                        </div>
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">ALERGIA</label>
                                    <input id="alergia_e" name="alergia_e" type="text" class="form-control" />             
                                </div>
                            </div>
                        </div>
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">MEDICAMENTO ACTUAL</label>
                                    <input id="medicamento_e" name="medicamento_e" type="text" class="form-control" />                      
                                </div>
                            </div>
                        </div>
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">ENFERMEDAD</label>
                                    <input id="enfermedad_e" name="enfermedad_e" type="text" class="form-control" />            
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                @include('../personas/avatar')
            </div>
            <br>
            <div class="row">
                <ul class="nav nav-pills nav-pills-icons nav-pills-info nav-stacked" role="tablist">
                    <li class="active">
                        <a href="#1" role="tab" data-toggle="tab">
                            <i class="material-icons">info</i>Básica
                        </a>
                    </li>
                     @role(['administrador', 'doctor']) <!-- al terminar esta sección debemos manejar estos datos con abilidades y persmisos a cada perfil "administrador", "doctor", 
                    "recepcionista", "paciente"-->
                    <li>
                        <a href="#2" role="tab" data-toggle="tab">
                            <i class="material-icons">fingerprint</i>Personal
                        </a>
                    </li>
                    @endrole
                </ul>
            </div>
        </div>
    </div>
</div>