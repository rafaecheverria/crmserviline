<!-- notice modal -->

<div class="modal fade" id="modal_organizacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header-primary">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>

                <h6>ORGANIZACIÓN </h6>

            </div>

            <div class="modal-body-add">

                <div class="col-md-12">

                    <div class="row">

                        <div class="col-md-12">

                            <div id="contenido-modal">

                                @include('organizaciones.formulario')

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="modal-footer text-center">

                <div id="boton_organizacion"></div>

                <!--<a href="#" id="add_organizacion" class="btn btn-info pull-right">Agregar</a>-->

            </div>

        </div>

    </div>

</div>

<!-- end notice modal -->