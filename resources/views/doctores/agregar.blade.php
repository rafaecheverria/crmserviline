<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
                <form class="form" id="form_add_usuario">
                    <input type="text" name="tipo" class="tipo" value="doctor" hidden="true">
                    <div class="row sinpadding">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Rut:</label>
                                <input type="text" class="form-control" id="rut_add" name="rut_add">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nombres:</label>
                                <input type="text" class="form-control" id="nombres_add" name="nombres_add">
                            </div>
                        </div>
                        <div class="col-md-6">
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
                </form>
        </div>
    </div>
</div>

<!-- 
    <div class="col-md-12">
        <div class="form-group label-floating">
            <label>Especialidades</label>
            <select id="especialidades" name="especialidades[]" class="selectpicker" multiple="multiple" data-live-search="true" data-style="select-with-transition">
                @foreach($especialidades as $especialidad)
                <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                @endforeach
            </select>                       
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">ESTUDIOS COMPLEMENTARIOS</label>
            <textarea rows="6" type="text" class="form-control" id="estudios_complementarios" name="estudios_complementarios"></textarea>
        </div>
    </div>
-->