<!-- notice modal -->
<div class="modal fade" id="modal_editar_rol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header-red">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h6>EDITAR ROL: <b><span class="title-name_e"></span></b></h6>
            </div>
            <div class="modal-body-edit">
                @include('roles.form_editar')
            </div>
            <div class="modal-footer text-center">
                <a href="#" id="update_editar_rol" class="btn btn-success pull-right">Actualizar</a>
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->

