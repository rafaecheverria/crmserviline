<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
                <form class="form" id="form_add_usuario">
                    <input type="text" name="tipo" class="tipo" value="doctor" hidden="true">
                    <div class="row sinpadding">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Rut:</label>
                                <input type="text" class="form-control" id="rut_add" name="rut_add">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nombre / Razón Social:</label>
                                <input type="text" class="form-control" id="nombres_add" name="nombres_add">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Email:</label>
                                <input type="email" class="form-control" id="email_add" name="email_add">
                            </div>
                        </div>
                        <div class="col-md-6">
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
                    <div class="row">
                        <div class="col-md-12"> 
                            <div class="form-group">
                              <label class="control-label">Calidad</label>
                              <select id="speciality_id_add" name="speciality_id" class="selectpicker show-tick" data-dropup-auto="false" data-size="5" data-live-search="true" data-style="select-with-transition">
                                    <option value=""> Seleccione </option>
                                        <option value="micro">Micro</option>
                                        <option value="pequena">Pequeña</option>
                                        <option value="mediana">Mediana</option>
                                        <option value="grande">Grande</option>
                              </select>
                            </div>
                        </div>
                    </div>  

                </form>
        </div>
    </div>
</div>

<!--

<div class="row">
    <div class="col-md-12"> 
        <div class="form-group">
          <label class="control-label">REGIÓN</label>
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
          <label class="control-label">CIUDAD</label>
          <select id="ciudad_id" data-live-search="true" name="ciudad_id" class="selectpicker show-tick" data-dropup-auto="false" data-size="5" data-style="select-with-transition">
                <option value="0"> Seleccione </option>
          </select>
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
    <div class="col-md-12"> 
        <div class="form-group">
          <label class="control-label">CALIDAD</label>
          <select id="speciality_id_add" name="speciality_id" class="selectpicker show-tick" data-dropup-auto="false" data-size="5" data-live-search="true" data-style="select-with-transition">
                <option value=""> Seleccione </option>
                    <option value="micro">Micro</option>
                    <option value="pequena">Pequeña</option>
                    <option value="mediana">Mediana</option>
                    <option value="grande">Grande</option>
          </select>
        </div>
    </div>
</div>  

                -->