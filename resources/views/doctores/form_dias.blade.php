<form id="form_dias">
	<input type="text" id="doctor_id_dia" name="doctor_id" hidden="true" />                    
    <div class="row sinpadding">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">FECHA</label>
                <input id="fecha_inicio_dia" name="fecha_inicio" type="text" class="form-control datepicker" placeholder="dd-mm-aaaa" 
                />                    
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">HORA INICIO</label>
                <input id="hora_inicio_dia" type="text" name="hora_inicio" class="form-control timepicker" placeholder="00:00" />                    
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">HORA FIN</label>
                <input id="hora_fin_dia" type="text" name="hora_fin" class="form-control timepicker" placeholder="00:00" />                   
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12"> 
            <div class="form-group">
                <label class="control-label">OBSERVACIÓN</label>
                <input id="observacion_dia" name="observacion" type="text" class="form-control" />      
            </div>
        </div>
    </div>
</form>
<!-- end notice modal -->