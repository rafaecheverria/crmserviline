<div id="formulario_cambiar_estados">
<form class="form" id="form_cambiar_estado">
    {{csrf_field()}}
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                  <select id="select-estados" name="estado_id" class="form-control" data-style="select-with-transition">
                  
                  </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="togglebutton">
                <label>
                    <input type="checkbox"> Dar de baja
                </label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">NOTA:</label>
                <textarea rows="6" type="text" class="form-control nota" name="nota" maxlength="500"></textarea>
            </div>
        </div>
    </div>
</form>
</div>