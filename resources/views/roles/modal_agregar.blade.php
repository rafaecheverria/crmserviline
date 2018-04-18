<!-- notice modal -->
<div class="modal fade" id="modal_agregar_rol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h6>AGREGAR ROL </h6>
            </div>
            <div class="modal-body-add">
                @include('roles.form_agregar')
            </div>
            <div class="modal-footer text-center">
                <a href="#" id="add_rol" class="btn btn-info pull-right">Agregar</a>
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->