<!-- notice modal -->

<div class="modal fade" id="modal_categoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header-primary">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>

                <h6>CATEGORÍA </h6>

            </div>

            <div class="modal-body-add">

                <div class="col-md-12">

                    <div class="row">

                        <div class="col-md-12">

                            <div id="contenido-modal">

                                @include('categorias.formulario')

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="modal-footer text-center">

                <div id="btn-categoria"></div>

                <!--<a href="#" id="add_organizacion" class="btn btn-info pull-right">Agregar</a>-->

            </div>

        </div>

    </div>

</div>

<!-- end notice modal -->