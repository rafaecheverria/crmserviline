<!-- notice modal -->
<div class="modal fade" id="modal_editar_paciente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h6>EDITAR PACIENTE: <b><span class="title-name_e"></span></b></h6>
            </div>
            <div class="modal-body-edit">
                @include('pacientes.form_editar') 
            </div>
            <div class="modal-footer text-center">
                <a href="#" id="update_editar_paciente" class="btn btn-info pull-right">Actualizar</a>
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->

<!-- small modal -->
    <div class="modal fade" id="eliminar_paciente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-small ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                </div>
                <div class="modal-body text-center">
                    <h5><i class="material-icons">warning</i><br>
                    Esta seguro de eliminar a este paciente? </h5>
                </div>
                <div class="modal-footer text-right">
                    <div id="eliminar"></div>
                </div>
            </div>
        </div>
    </div>
<!--    end small modal -->