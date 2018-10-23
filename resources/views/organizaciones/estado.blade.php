<div class="row sinpadding">
  <div class="col-md-9"> 
    <form class="form" id="form_estado">
      <input id="id_empresa" name="id" hidden="true" />
      <div class="form-group">
        <label class="control-label">ESTADO</label>
        <select id="select_estado" name="estado" class="form-control">
          <option value="1" style="background: #F44336; color: white;">PROSPECTO</option>
          <option value="2" style="background: #DF2869; color: white;">CONTACTADO</option>
          <option value="3" style="background: #FF9800; color: white;">REUNIÓN</option>
          <option value="4" style="background: #00BCD4; color: white;">PROPUESTA</option>
          <option value="5" style="background: #9C27B0; color: white;">NEGOCIACIÓN</option>
          <option value="6" style="background: #4CAF50; color: white;">CIERRE</option> 
        </select>
      </div>
    </form>
    <br>
    <br>
  </div>
  <div class="col-md-3">
    <div id="add_contact">
      <a class="btn btn-primary btn-sm" onclick="cambiar_estado()">Cambiar Estado</a>
    </div>
  </div>
</div>

