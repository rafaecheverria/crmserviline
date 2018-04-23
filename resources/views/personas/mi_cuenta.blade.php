<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <form class="form" id="form_micuenta">
                <input type="text" id="id_micuenta"  value="{{Auth::user()->id}}" hidden="true">
                <div class="row sinpadding">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">NOMBRES:</label>
                            <input type="text" class="form-control" name="nombres" value="{{Auth::user()->nombres}}">
                        </div>
                    </div>
                </div>
                <div class="row sinpadding">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">APELLIDOS:</label>
                            <input type="text" class="form-control" name="apellidos" value="{{Auth::user()->apellidos}}">
                        </div>
                    </div>
                </div>
                <div class="row sinpadding">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">NACIMIENTO:</label>
                            <input type="text" class="form-control datepicker" name="nacimiento" value="{{Auth::user()->nacimiento}}">
                        </div>
                    </div>
                </div>
                <div class="row sinpadding">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">EMAIL:</label>
                            <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                        </div>
                    </div>
                </div>
                <div class="row sinpadding">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">TELÉFONO:</label>
                            <input type="text" class="form-control" name="telefono" value="{{Auth::user()->telefono}}">
                        </div>
                    </div>
                </div>
                <div class="row sinpadding">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">DIRECCIÓN:</label>
                            <input type="text" class="form-control" name="direccion" value="{{Auth::user()->direccion}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="radio">
                            <label>
                                @if(Auth::user()->genero == "masculino")
                                    <input type="radio" name="genero" value="masculino" checked="true">MASCULINO
                                @else
                                    <input type="radio" name="genero" value="masculino">MASCULINO
                                @endif
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="radio">
                            <label>
                                @if(Auth::user()->genero == "femenino")
                                    <input type="radio" name="genero" value="femenino" checked="true">FEMENINO
                                @else
                                    <input type="radio" name="genero" value="femenino">FEMENINO
                                @endif
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>