<form class="form" id="form_producto" enctype="multipart/form-data">

    <div class="col-md-12"> 

        <div class="row">

            <div class="col-md-4">

                <div class="row">

                    <div class="file-field input-field">

                        <input type="text" name="imagen" id="imagen">

                        <input type="file" name="imagen_default" id="imagen_default" class="hidden">

                    </div>

                    <a href="#">

                        <div class="photo">

                            <img src="images/productos/default.png" alt="Thumbnail Image" class="img-rounded img-responsive imagen">

                        </div>

                    </a>

                </div>

                <div class="row">

                    <ul class="nav nav-pills nav-pills-icons nav-pills-primary nav-stacked" role="tablist">

                        <li class="active">

                            <a href="#1" role="tab" data-toggle="tab">

                                Click en la imagen

                            </a>

                        </li>

                    </ul>

                </div>

            </div>

            <br>

            <div class="col-md-8 sinpadding">

                <input type="text" name="id" id="id_producto" hidden="true">

                    <div class="row sinpadding">

                        <div class="col-md-12"> 

                            <div class="form-group">

                              <label class="control-label">Categoria</label>

                                <select id="categoria_id" name="categoria_id" class="selectpicker" data-dropup-auto="false" data-size="8" data-live-search="true" data-style="select-with-transition">

                                    <option value=""> Seleccione </option>

                                    @foreach($categorias as $categoria)

                                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>

                                    @endforeach

                              </select>

                            </div>

                        </div>

                    </div>

                    <div class="row sinpadding">

                        <div class="col-md-12">

                            <div class="form-group">

                                <label class="control-label">Codigo:</label>

                                <input type="text" class="form-control" id="codigo" name="codigo" readonly="readonly">

                            </div>

                        </div>

                        <div class="col-md-12">

                            <div class="form-group">

                                <label class="control-label">Descripcion:</label>

                                <input type="text" class="form-control" id="descripcion" name="descripcion" >

                            </div>

                        </div>

                    </div>

                    <div class="row sinpadding">

                        <div class="col-md-12">

                            <div class="form-group">

                                <label class="control-label">Stock:</label>

                                <input type="number" class="form-control" id="apellidos_user" name="apellidos_user">

                            </div>

                        </div>

                    </div>

                    <div class="row sinpadding">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label class="control-label">Precio Compra:</label>

                                <input type="email" class="form-control" id="precio_compra" name="precio_compra" >

                            </div>

                        </div>

                        <div class="row sinpadding">

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label class="control-label">Precio Venta:</label>

                                    <input type="text" class="form-control" id="precio_venta" name="precio_venta" >

                                </div>

                            </div>

                        </div>

                    </div>

                    <!--

                    <div class="row sinpadding">

                        <div class="form-group">

                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                                <div class="fileinput-new thumbnail">

                                    <img src="assets/img/image_placeholder.jpg" alt="...">

                                </div>

                                <div class="fileinput-preview fileinput-exists thumbnail"></div>

                                <div>
                                    <span class="btn btn-primary btn-round btn-file">

                                        <span class="fileinput-new">Cargar una Imagen</span>

                                        <span class="fileinput-exists">Cambiar</span>

                                        <input type="file" name="..." />

                                    </span>

                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Borrar</a>

                                </div>

                            </div>

                        </div>    

                    </div>

                -->

        </div>

        <br>

        </div>

    </div>

</form>