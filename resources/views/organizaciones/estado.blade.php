<div class="row sinpadding">
  <div class="col-md-9"> 
    <form class="form" id="form_estado">
      <input id="id_empresa" name="id" hidden="true" />
      <div class="form-group">
        <label class="control-label">ESTADO</label>
        <select id="estado" name="estado" class="form-control">
          <option value="0"> SELECCIONE ESTADO</option>
          <option value="prospecto">PROSPECTO</option>
          <option value="reunion">REUNIÓN</option>
          <option value="propuesta">PROPUESTA</option>
          <option value="negociacion">NEGOCIACIÓN</option>
          <option value="cierre">CIERRE</option>
        </select>
      </div>
    </form>
  </div>
  <div class="col-md-3">
    <div id="add_contact">
      <a class="btn btn-rose btn-sm" onclick="cambiar_estado()">Cambiar Estado</a>
    </div>
  </div>
</div>

