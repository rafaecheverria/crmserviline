<!-- notice modal -->
<div class="modal fade" id="modal_cargo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header-primary">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h6>AGREGAR CARGO </h6>
            </div>
            <div class="modal-body-add">
                @include('cargos.formulario')
            </div>
            <div class="modal-footer text-center">
                <div id="boton_cargo"></div>
                <!-- <a href="#" id="add_cargo" class="btn btn-info pull-right">Agregar</a> -->
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->