<!-- notice modal -->
<div class="modal fade" id="modal_agregar_doctor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header-red">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h6>AGREGAR DOCTOR </h6>
            </div>
            <div class="modal-body-add">
                @include('doctores.agregar')
            </div>
            <div class="modal-footer text-center">
                <a href="#" id="add_usuario" class="btn btn-danger pull-right">Agregar</a>
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->