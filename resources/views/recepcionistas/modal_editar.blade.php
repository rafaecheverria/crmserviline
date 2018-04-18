<!-- notice modal -->
<div class="modal fade" id="modal_editar_recepcionista" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header-success">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h6>EDITAR RECEPCIONISTA: <b><span class="title-name"></span></b></h6>
            </div>
            <div class="modal-body-edit">
                @include('recepcionistas.form_editar')
            </div>
            <div class="modal-footer text-center">
                <a href="#" id="update_editar_usuario" class="btn btn-success pull-right">Actualizar</a>
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->