<!-- notice modal -->
<div class="modal fade" id="modal_especialidades" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header-red">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h6>ESPECIALIDADES DEL DOCTOR:  <b><span class="title-name"></span></b></h6>
            </div>
            <div class="modal-body">
                @include('doctores.especialidades')
            </div>
            <br>
            <div class="modal-footer text-center">
                <a href="#" class="btn btn-warning pull-right" data-dismiss="modal">Cerrar</a>
                <a href="#" id="update_especialidades" class="btn btn-danger pull-right">Guardar</a>
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->