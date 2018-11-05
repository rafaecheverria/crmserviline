<form class="form" id="form_cambiar_estado">
    {{csrf_field()}}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
              <select id="select-estados" name="estado_id" class="form-control" data-style="select-with-transition">
              
              </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">NOTA:</label>
                <textarea rows="6" type="text" class="form-control" name="nota" maxlength="500"></textarea>
            </div>
        </div>
    </div>
</form>