<!-- notice modal -->
<div class="modal fade" id="modal_clave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header-red">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h6>INGRESAR NUEVA CONTRASEÑA </h6>
            </div>
            <div class="modal-body">
                <form id="form_clave">
                    <input type="text" name="id" id="id" hidden="true">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">CONTRASEÑA:</label>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">CONFIRMAR CONTRASEÑA:</label>
                            <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" autocomplete="off">
                        </div>
                    </div>
                </div>
            </form>
            </div>
            <div class="modal-footer text-center">
                <a href="#" id="update_clave" class="btn btn-danger pull-right">Guardar</a>
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->