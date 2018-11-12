<form class="form" id="form_organizacion">
    {{csrf_field()}}
<input type="text" name="id" id="id" hidden="true"> 
 <div class="row sinpadding">
    <div class="col-md-12"> 
        <div class="form-group">
          <label class="control-label">REGIÓN</label>
          <select id="region_id" name="region_id" class="selectpicker show-tick" data-dropup-auto="false" data-size="5" data-live-search="true" data-style="select-with-transition">
                <option value=""> Seleccione </option>
                 @foreach($regiones as $region)
                    <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                @endforeach
          </select>
        </div>
    </div>
    <div id="ciudad-show" style="display: none;">
    <div class="col-md-12 sinpadding"> 
        <div class="form-group">
          <label class="control-label">CIUDAD</label>
          <select id="ciudad_id" data-live-search="true" name="ciudad_id" class="selectpicker show-tick" data-dropup-auto="false" data-size="5" data-style="select-with-transition">
                <option value="0"> Seleccione </option>
          </select>
        </div>
    </div>
    </div>
</div>

@role('vendedor')
   <input id="vendedor_id" name="vendedor_id" value="{{Auth::User()->id}}" hidden="true" />                 
@else
<div id="vendedor-show" style="display: none;">
    <div class="row sinpadding">
        <div class="col-md-10 col-lg-10 col-sm-10"> 
            <div class="form-group">
              <label class="control-label">VENDEDOR DUEÑO DEL CONTACTO</label>
              <!-- <div id="show_contact"></div> -->
              <select id="vendedor_id" name="vendedor_id" class="selectpicker show-tick" data-dropup-auto="false" data-size="5" data-live-search="true" data-style="select-with-transition">
                    <option value="0"> Seleccione </option>
                     @foreach($vendedores as $vendedor)
                        <option value="{{ $vendedor->id }}">{{ $vendedor->nombres }} {{$vendedor->apellidos }}</option>
                    @endforeach
              </select>
            </div>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-2"> 
            <div id="add_contact">
              <a href="#" onclick="mostrar_contacto(1,1)" class="btn btn-rose btn-round btn-sm">+</a>
            </div>
        </div>
    </div>
</div>
@endrole

<div id="display" style="display: none;">
<div class="row sinpadding">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">RUT:</label>
            <input type="text" class="form-control" id="rut" name="rut">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">NOMBRE / RAZÓN SOCIAL:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" >
        </div>
    </div>
</div>
<div class="row sinpadding">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">EMAIL:</label>
            <input type="email" class="form-control" id="email" name="email" >
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">GIRO:</label>
            <input type="text" class="form-control" id="giro" name="giro" >
        </div>
    </div>   
</div>
<div class="row sinpadding">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">DIRECCIÓN:</label>
            <input type="text" class="form-control" id="direccion" name="direccion" >
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">TELÉFONO:</label>
            <input type="text" class="form-control" id="telefono" name="telefono" >
        </div>
    </div>
</div>
<div class="row sinpadding">
 <div class="col-md-10 col-lg-10 col-sm-10"> 
        <div class="form-group">
          <label class="control-label">CONTACTO DIRECTO CON LA EMPRESA</label>
          <!-- <div id="show_contact"></div> -->
          <select id="contacto_id" name="contacto_id[]" multiple="multiple" class="selectpicker show-tick" data-size="5" data-live-search="true" data-style="select-with-transition">
                 @foreach($contactos as $contacto)
                    <option value="{{ $contacto->id }}">{{ $contacto->nombres }} {{$contacto->apellidos }}</option>
                @endforeach
          </select>
        </div>
    </div>
    <div class="col-md-2 col-lg-2 col-sm-2"> 
        <div id="add_contact">
          <a href="#" onclick="mostrar_contacto(1,2)" class="btn btn-rose btn-round btn-sm">+</a>
        </div>
    </div>
</div>
<br>
<div class="row">
        <div class="col-sm-3">
                <div class="radio">
                    <label>
                        <input type="radio" name="tipo" value="micro">Micro
                    </label>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="radio">
                    <label>
                        <input type="radio" name="tipo" value="pequena">Pequeña
                    </label>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="radio">
                    <label>
                        <input type="radio" name="tipo" value="mediana">Mediana
                    </label>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="radio">
                    <label>
                        <input type="radio" name="tipo" value="grande">Grande
                    </label>
                </div>
            </div>
        </div> 
    </div>
</form>

    