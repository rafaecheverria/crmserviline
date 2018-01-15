<!-- notice modal -->
<div class="modal fade" id="antecedentePersonalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h6 class="modal-title" id="myModalLabel">ANTECEDENTES PERSONALES DEL PACIENTE<span class="title-name"></span></h6>
            </div>
            <div class="modal-body">
                @include('pacientes.form_antecedentes')
            </div>
            <div class="modal-footer text-center">
                <a href="#" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</a>
                <a href="#" id="update_antecedentes_paciente" class="btn btn-info pull-right">Guardar</a>
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->