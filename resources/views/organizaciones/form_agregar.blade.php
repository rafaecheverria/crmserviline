<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
                <form class="form" id="form_add_organizacion">
                     <div class="row sinpadding">
                        <div class="col-md-12"> 
                            <div class="form-group">
                              <label class="control-label">Región</label>
                              <select id="region_id" name="region_id" class="selectpicker show-tick" data-dropup-auto="false" data-size="5" data-live-search="true" data-style="select-with-transition">
                                    <option value=""> Seleccione </option>
                                     @foreach($regiones as $region)
                                        <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                    @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="col-md-12"> 
                            <div class="form-group">
                              <label class="control-label">Ciudad</label>
                              <select id="ciudad_id" data-live-search="true" name="ciudad_id" class="selectpicker show-tick" data-dropup-auto="false" data-size="5" data-style="select-with-transition">
                                    <option value="0"> Seleccione </option>
                              </select>
                            </div>
                        </div>
                    </div>

                    <div id="display" style="display: none;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Rut:</label>
                                <input type="text" class="form-control" id="rut_add" name="rut_add">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nombre / Razón Social:</label>
                                <input type="text" class="form-control" id="nombre_add" name="nombre_add" hidden="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Email:</label>
                                <input type="email" class="form-control" id="email_add" name="email_add" hidden="true">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Giro:</label>
                                <input type="text" class="form-control" id="giro_add" name="giro_add" hidden>
                            </div>
                        </div>   
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Dirección:</label>
                                <input type="text" class="form-control" id="direccion_add" name="direccion_add" hidden>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Teléfono:</label>
                                <input type="text" class="form-control" id="telefono_add" name="telefono_add" hidden="true">
                            </div>
                        </div>
                    </div>
                    <div class="row sinpadding">
                     <div class="col-md-10 col-lg-10 col-sm-10"> 
                            <div class="form-group">
                              <label class="control-label">Propietario del Contacto</label>
                              <select id="contacto_id" name="contacto_id[]" multiple="multiple" class="selectpicker show-tick" data-dropup-auto="false" data-size="5" data-live-search="true" data-style="select-with-transition">
                                     @foreach($contactos as $contacto)
                                        <option value="{{ $contacto->id }}">{{ $contacto->nombres }} {{$contacto->apellidos }}</option>
                                    @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-2"> 
                            <div id="add_contact">
                              <a href="#" class="btn btn-rose btn-round btn-sm">+</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                            <div class="col-sm-3">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="tipo_add" value="micro">MICRO
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="tipo_add" value="peuqena">PEQUEÑA
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="tipo_add" value="mediana">MEDIANA
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="tipo_add" value="grande">GRANDE
                                        </label>
                                    </div>
                                </div>
                            </div> 
                    </div>

                </form>
        </div>
    </div>
</div>