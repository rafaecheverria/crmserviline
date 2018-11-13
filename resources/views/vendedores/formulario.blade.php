<form class="form" id="form_contacto">
    <input type="text" name="id" id="id_user" hidden="true">
    <input type="text" name="tipo_user" id="tipo_user" hidden="true"> 
    <div class="row sinpadding">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Rut:</label>
                <input type="text" class="form-control" id="rut_user" name="rut_user">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Nombres:</label>
                <input type="text" class="form-control" id="nombres_user" name="nombres_user" >
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
