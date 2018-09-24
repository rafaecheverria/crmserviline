<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
                <form class="form" id="form_organizacion">
                    <input type="text" name="id" id="id" hidden="true"> 

                    <div class="row sinpadding">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Rut:</label>
                                <input type="text" class="form-control" id="rut" name="rut">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nombres:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Apellidos:</label>
                                <input type="text" class="form-control" id="rut" name="rut">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" >
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Dirección:</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Teléfono:</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" >
                            </div>
                        </div>
                    </div>
                    <br>
            <div class="row sinpadding">
                     <div class="col-md-10 col-lg-10 col-sm-10"> 
                            <div class="form-group">
                              <label class="control-label">Cargo</label>
                              <!-- <div id="show_contact"></div> -->
                              <select id="contacto_id" name="contacto_id[]" multiple="multiple" class="selectpicker show-tick" data-dropup-auto="false" data-size="5" data-live-search="true" data-style="select-with-transition">
                                    <option>Cargo 1</option>
                                    <option>Cargo 2</option>
                                    <option>Cargo 3</option>
                                    <option>Cargo 4</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-2"> 
                            <div id="add_contact">
                              <a href="#" class="btn btn-rose btn-round btn-sm">+</a>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>