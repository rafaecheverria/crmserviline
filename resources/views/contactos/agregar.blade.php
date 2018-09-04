<div class="col-md-12">
    <div class="row">
        <div class="col-md-8">
            <div class="tab-content">
                <div class="tab-pane active" id="add_1">
                    <form class="form" id="form_add_paciente">
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Rut:</label>
                                    <input type="text" class="form-control" id="rut_add" name="rut_add">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombres:</label>
                                    <input type="text" class="form-control" id="nombres_add" name="nombres_add">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Apellidos:</label>
                                    <input type="text" class="form-control" id="apellidos_add" name="apellidos_add">
                                </div>
                            </div>
                        </div>
                        <div class="row sinpadding">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Nacimiento:</label>
                                    <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker" id="nacimiento_add" name="nacimiento_add">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Email:</label>
                                    <input type="email" class="form-control" id="email_add" name="email_add">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Teléfono:</label>
                                    <input type="text" class="form-control" id="telefono_add" name="telefono_add">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Dirección:</label>
                                    <input type="text" class="form-control" id="direccion_add" name="direccion_add">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="genero_add" value="masculino">MASCULINO
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="genero_add" value="femenino">FEMENINO
                                        </label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    
                <div class="tab-pane" id="add_2">
                        <div class="row sinpadding">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">SANGRE</label>
                                    <select id="sangre_add" name="sangre_add" class="form-control" data-style="select-with-transition">
                                        <option value="">-- Seleccione --</option>
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
                                    <select id="vih_add" name="vih_add" class="form-control" data-style="select-with-transition">
                                        <option value="">-- Seleccione --</option>
                                        <option value="negativo">Negativo </option>
                                        <option value="positivo">Positivo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Peso</label>
                                    <input id="peso_add" name="peso_add" type="number" class="form-control" />                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Estatura</label>
                                    <input id="altura_add" name="altura_add" type="number" class="form-control" />                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Alergia</label>
                                    <input id="alergia_add" name="alergia_add" type="text" class="form-control" />             
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Medicamento Actual</label>
                                    <input id="medicamento_add" name="medicamento_add" type="text" class="form-control" />                      
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Enfermedad</label>
                                    <input id="enfermedad_add" name="enfermedad_add" type="text" class="form-control" />            
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <ul class="nav nav-pills nav-pills-icons nav-pills-info nav-stacked" role="tablist">
                    <li class="active">
                        <a href="#add_1" role="tab" data-toggle="tab">
                            <i class="material-icons">info</i>Básica
                        </a>
                    </li>
                    @role(['administrador', 'doctor']) <!-- al terminar esta sección debemos manejar estos datos con abilidades y persmisos a cada perfil "administrador", "doctor", 
                    "recepcionista", "paciente"-->
                    <li>
                        <a href="#add_2" role="tab" data-toggle="tab">
                            <i class="material-icons">fingerprint</i>Personal
                        </a>
                    </li>
                    @endrole
                </ul>
            </div>
        </div>
    </div>
</div>