<div class="row sinpadding">
    <form class="form" id="agregar_nota">
      <input id="id_empresa" name="id" hidden="true" />
        <label class="control-label">ESTADOS:</label> <select id="select_estado" name="estado" class="form-control">
          <div class="row sinpadding">
              <div class="col-md-12">
                  <div class="form-group">
                      <label class="control-label">NOTA:</label>
                      <textarea rows="6" type="text" class="form-control" id="nota" name="nota"></textarea>
                  </div>
              </div>
          </div>
    </form>
    <br>
    <br>
  <div class="col-md-3">
    <div id="add_contact">
      <a class="btn btn-primary btn-sm" onclick="cambiar_estado()">Cambiar Estado</a>
    </div>
  </div>
</div>

