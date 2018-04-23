<!-- notice modal -->
<div class="modal fade" id="modal_editar_doctor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header-red">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h6>EDITAR DOCTOR: <b><span class="title-name"></span></b></h6>
            </div>
            <div class="modal-body-edit">
                @include('doctores.form_editar')
            </div>
            <div class="modal-footer text-center">
                <a href="#" id="actualizar_usuario" class="btn btn-danger pull-right">Actualizar</a>
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->

<!-- small modal -->
    <div class="modal fade" id="eliminar_doctor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-small ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                </div>
                <div class="modal-body text-center">
                    <h5><i class="material-icons">warning</i><br>
                    Esta seguro de eliminar este doctor? </h5>
                </div>
                <div class="modal-footer text-right">
                    <div id="eliminar"></div>
                </div>
            </div>
        </div>
    </div>
<!--    end small modal -->