<form class="form" id="form_contacto">

    <input type="text" name="id" id="id_user" hidden="true">

    <input type="text" name="tipo_user" id="tipo_user" hidden="true"> 

    <div class="row">

        <div class="col-md-6">

            <div class="form-group">

                <label class="control-label">Nombres:</label>

                <input type="text" class="form-control" id="nombres_user" name="nombres_user" >

            </div>

        </div>

        <div class="col-md-6">

            <div class="form-group">

                <label class="control-label">Rut:</label>

                <input type="text" class="form-control" id="rut_user" name="rut_user">

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-6">

            <div class="form-group">

                <label class="control-label">Apellidos:</label>

                <input type="text" class="form-control" id="apellidos_user" name="apellidos_user">

            </div>

        </div>

        <div class="col-md-6">

            <div class="form-group">

                <label class="control-label">Email:</label>

                <input type="email" class="form-control" id="email_user" name="email_user" >

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-6">

            <div class="form-group">

                <label class="control-label">Dirección:</label>

                <input type="text" class="form-control" id="direccion_user" name="direccion_user" >

            </div>

        </div>

        <div class="col-md-6">

            <div class="form-group">

                <label class="control-label">Teléfono:</label>

                <input type="text" class="form-control" id="telefono_user" name="telefono_user" >

            </div>

        </div>

    </div>

    <br>

    <div id="show-empresas"  style="display: none;">

        <div class="row sinpadding">

            <div class="col-md-10 col-lg-10 col-sm-10"> 

                <div class="form-group">

                  <label class="control-label">Empresa</label>

                  <select id="organizacion_id" name="organizacion_id[]" multiple="multiple" class="selectpicker show-tick" data-dropup-auto="false" data-size="8" data-live-search="true" data-style="select-with-transition">

                        <option value="" disabled> Seleccione </option>

                        @foreach($empresas as $empresa)

                            <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>

                        @endforeach

                  </select>

                </div>

            </div>

            <div class="col-md-2 col-lg-2 col-sm-2"> 

                <div id="add_contact">

                  <a href="#" onclick="organizacion_user(0,1)" class="btn btn-rose btn-round btn-sm">+</a>

                </div>

            </div>

        </div>

    </div>

    <div id="show-cargo"  style="display: none;">

        <div class="row sinpadding">

            <div class="col-md-10 col-lg-10 col-sm-10"> 

                <div class="form-group">

                  <label class="control-label">Cargo</label>

                  <select id="cargo_id" name="cargo_id" class="selectpicker show-tick" data-dropup-auto="false" data-size="8" data-live-search="true" data-style="select-with-transition">

                        <option value="" disabled> Seleccione </option>

                        @foreach($cargos as $cargo)

                            <option value="{{ $cargo->id }}">{{ $cargo->nombre }}</option>

                        @endforeach

                  </select>

                </div>

            </div>

            <div class="col-md-2 col-lg-2 col-sm-2"> 

                <div id="add_contact">

                  <a href="#" onclick="mostrar_cargo(0,1)" class="btn btn-rose btn-round btn-sm">+</a>

                </div>

            </div>

        </div>

    </div>

    <br>

    <div class="row">

        <div class="col-sm-6">

            <div class="radio">

                <label>

                    <input type="radio" name="genero" value="masculino">MASCULINO

                </label>

            </div>

        </div>

        <div class="col-sm-6">

            <div class="radio">

                <label>

                    <input type="radio" name="genero" value="femenino">FEMENINO

                </label>

            </div>

        </div>

    </div>
    
</form>
