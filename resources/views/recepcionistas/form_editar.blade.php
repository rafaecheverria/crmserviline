<div class="col-md-12">
    <div class="row">
        <div class="col-md-8">
            <form class="form" id="form_editar_usuario">
                <input type="text" name="id" id="id" hidden="true"> 
                <input type="text" name="tipo" class="tipo" id="tipo" value="recepcionista" hidden="true">
                <div class="row sinpadding">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">NOMBRES:</label>
                            <input type="text" class="form-control" id="nombres" name="nombres">
                        </div>
                    </div>
                </div>
                <div class="row sinpadding">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">APELLIDOS:</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos">
                        </div>
                    </div>
                </div>
                <div class="row sinpadding">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">NACIMIENTO:</label>
                            <input type="text" class="form-control datepicker" id="nacimiento" name="nacimiento">
                        </div>
                    </div>
                </div>
                <div class="row sinpadding">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">EMAIL:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
                </div>
                <div class="row sinpadding">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">TELÉFONO:</label>
                            <input type="text" class="form-control" id="telefono" name="telefono">
                        </div>
                    </div>
                </div>
                <div class="row sinpadding">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">DIRECCIÓN:</label>
                            <input type="text" class="form-control" id="direccion" name="direccion">
                        </div>
                    </div>
                </div>
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
        </div>
        <div class="col-md-4">
            <div class="row">
                @include('../personas/avatar')
            </div>
        </div>
    </div>
</div>