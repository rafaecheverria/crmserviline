<!-- notice modal -->
<div class="modal fade" id="modal_cambiar_estado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header-primary">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <div id="titulo_estado"></div>
            </div>
            <div class="modal-body-add">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="contenido-modal">
                                @include('organizaciones.cambiar_estado')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <div id="boton-cambiar-estado"></div>
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->