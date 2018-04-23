<!-- notice modal -->
<div class="modal fade" id="modal_micuenta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header-red">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h6>MIS DATOS: <b>{{Auth::user()->nombres}} {{Auth::user()->apellidos}}</b></h6>
            </div>
            <div class="modal-body-edit">
                @include('personas.mi_cuenta')
            </div>
            <div class="modal-footer text-center">
                <a href="#" id="update_micuenta" class="btn btn-danger pull-right">Actualizar</a>
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->