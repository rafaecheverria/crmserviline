<!-- notice modal -->
<div class="modal fade" id="modal_permisos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h6>PERMISOS DEL ROL:  <b><span class="title-name"></span></b></h6>
            </div>
            <div class="modal-body">
                @include('roles.permisos')
            </div>
            <br>
            <div class="modal-footer text-center">
                <a href="#" class="btn btn-danger pull-right" data-dismiss="modal">Cerrar</a>
                <a href="#" id="update_permisos_roles" class="btn btn-info pull-right">Guardar</a>
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->