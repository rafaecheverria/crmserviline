<!-- notice modal -->
<div class="modal fade" id="modal_productos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header-primary">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>

                <h6>

                	Formulario de Producto

                </h6>

            </div>

            <div class="padding-top">

                <div class="col-md-12">

                    <div class="row">

                        <div class="col-md-12">

                            <div id="contenido-modal">

                                @include('productos.formulario')

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="modal-footer left">

                <div id="btn-producto"></div>

                <!-- <a href="#" id="add_paciente" class="btn btn-info pull-right">Agregar</a> -->

            </div>

        </div>

    </div>

</div>

<!-- end notice modal -->