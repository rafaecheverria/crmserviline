<!-- notice modal -->
<div class="modal fade" id="modal_clave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header-primary">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h6>NUEVA CONTRASEÑA PARA: <b><span class="title-name"></span></b></h6>
            </div>
            <div class="modal-body">
                <form id="form_clave">
                    <input type="text" name="tipo" class="tipo" value="user" hidden="true">
                    <input type="text" name="id" id="id_user_clave" hidden="true">
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
                <a href="#"  class="btn btn-primary pull-right" id="update_clave">Guardar</a>
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->