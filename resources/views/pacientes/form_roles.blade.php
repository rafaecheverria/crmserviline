<div class="instruction">
    <div class="row">
        <div class="col-md-4">
            <div class="picture center">
                <div id="image-modal"></div>
            </div>
        </div>
        <div class="col-md-8">
            {!! Form::open(['id' => 'form_update_roles_user']); !!}
            {!! Form::text('id', null,['id' => 'id', 'hidden' => true]); !!} 
            <div class="row">
                <div class="col-md-12"> 
                    <div class="form-group label-floating">
                        {!! Form::label('rut', 'Rut'); !!}
                        {!! Form::text('rut', null, ['id' => 'rut', 'readonly', 'class' => 'form-control', 'placeholder' => 'Rut']); !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group label-floating">
                        {!! Form::label('nombres', 'Nombres'); !!}
                        {!! Form::text('nombres',null, ['id' => 'nombres', 'readonly', 'class' => 'form-control', 'placeholder' => 'Nombres']); !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group label-floating">
                        {!! Form::label('roles', 'Roles'); !!}
                        <select id="role" name="role[]" multiple="multiple" class="selectpicker2" data-style="select-with-transition">
                        </select>                       
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="row">
    <i class="material-icons">info</i> 
    En este formulario podrá actualizar los roles del usuario <span class="title-name"></span>
</div>
