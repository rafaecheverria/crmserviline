<!-- notice modal -->

<div class="modal fade" id="modal_historial_estado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-notice">

        <div class="modal-content">

            <div class="modal-header-primary">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>

                <div id="title-estado"></div>

            </div>

            <div class="modal-body scroll">

                @include('organizaciones.historial')

            </div>

            <div class="modal-footer text-center">

                <div id="descargar"></div>

            </div>

        </div>

    </div>

</div>

<!-- end notice modal -->