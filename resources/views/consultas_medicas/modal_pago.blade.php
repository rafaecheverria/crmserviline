<!-- notice modal -->
<div class="modal fade" id="modal_pago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header-primary">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h6>DATOS DEL PAGO </h6>
            </div>
            <div class="modal-body">
                @include('consultas_medicas.pago')
            </div>
            <div class="modal-footer text-center">
                <a href="#" data-dismiss="modal" class="btn btn-primary pull-right">Cerrar</a>
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->