    <form class="form" id="form_nota">
      {{csrf_field()}}
      <input id="id_estado" name="estado_id" hidden="true" />
      <input id="id_empresa" name="organizacion_id" hidden="true" />
          <div class="row sinpadding">
              <div class="col-md-12">
                  <div class="form-group">
                      <label class="control-label">NOTA:</label>
                      <textarea rows="6" type="text" class="form-control nota" id="nota" name="nota" maxlength="500" placeholder="Escriba aquí una nota para el estado"></textarea>
                  </div>
              </div>
          </div>
    </form>
    <div class="contador"></div>
   <!--  <a class="btn btn-primary btn-sm btn pull-right" id="boton-agregar-nota" onclick="agregar_nota(0)">Agregar Nota</a> -->
   <div id="boton-agregar-nota"></div>


