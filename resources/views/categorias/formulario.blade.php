<form class="form-horizontal" id="form_categoria">

    {{csrf_field()}}

    <!-- INPUT OCULTO QUE GUARDA EL IG PARA CUANDO SE NECESITE EDITAR EL REGISTRO DE UNA CATEGORIA -->

    <input type="text" name="id" id="id" hidden="true"> 

    <div class="row sinpadding">

        <div class="col-md-12">

            <div class="form-group">

                <label class="control-label">CATEGORÍA:</label>

                <input type="text" class="form-control" id="categoria" name="categoria">

            </div>

        </div>

    </div>

</form>