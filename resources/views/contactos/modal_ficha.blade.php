<!-- notice modal -->

<div class="modal fade" id="modal_ficha_contacto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-notice">

        <div class="modal-content">

            <div class="modal-header-primary">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">

                    <i class="material-icons">clear</i>

                </button>

                <p>Ficha de Contacto:  

                    <b>

                        <span class="title-name"></span>

                    </b>

                </p>

            </div>

            <div class="modal-body">

                @include('contactos.ficha')

            </div>

            <div class="modal-footer text-center">

                <div id="cerrar"></div>

            </div>

        </div>

    </div>

</div>

<!-- end notice modal -->