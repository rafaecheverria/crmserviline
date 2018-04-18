<!-- notice modal -->
<div class="modal fade" id="modal_expediente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h6>EXPEDIENTE CLÍNICO DEL PACIENTE:  <b><span class="title-name"></span></b></h6>
            </div>
            <div class="modal-body">
                @include('pacientes.expediente')
            </div>
            <div class="modal-footer text-center">
                <div id="descargar"></div>
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->