<!-- notice modal -->
<div class="modal fade" id="antecedentePersonalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h5 class="modal-title" id="myModalLabel"><span class="title-name"></span></s></h5>
            </div>
            <div class="modal-body">
                @include('pacientes.form_roles')
            </div>
            <div class="modal-footer text-center">
                <a href="#" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</a>
                <a href="#" id="update_role_user" class="btn btn-info pull-right">Actulizar</a>
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->