<div class="instruction">
    <div class="row">
        <div class="col-md-4">
            <div class="picture center">
                <div id="image-modal"></div>
            </div>
        </div>
        <div class="col-md-12">
            {!! Form::open(['id' => 'form_antecedente_paciente']); !!}
            {!! Form::text('id', null,['id' => 'id', 'hidden' => true]); !!} 
            <div class="row">
                <div class="col-md-6"> 
                    <div class="form-group label-floating">
                        {!! Form::label('sangre', 'Sangre'); !!}
                        <select class="selectpicker" data-style="select-with-transition" title="Seleccione" data-size="7">
                            <option disabled> Seleccione</option>
                            <option value="2">A RH+</option>
                            <option value="3">AB-</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group label-floating">
                        {!! Form::label('vih', 'VIH'); !!}
                        <select class="selectpicker" data-style="select-with-transition" title="Seleccione" data-size="7">
                            <option disabled> Seleccione</option>
                            <option value="2">Negativo </option>
                            <option value="3">Positivo</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group label-floating">
                        {!! Form::label('peso', 'Peso', ['class' => 'control-label']); !!}
                        {!! Form::number('peso',null, ['id' => 'peso', 'class' => 'form-control']); !!}                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group label-floating">
                        {!! Form::label('altura', 'Altura', ['class' => 'control-label']); !!}
                        {!! Form::text('altura',null, ['id' => 'altura', 'class' => 'form-control']); !!}                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group label-floating">
                        {!! Form::label('alergia', 'Alergia', ['class' => 'control-label']); !!}
                        {!! Form::text('alergia',null, ['id' => 'alergia', 'class' => 'form-control']); !!}                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group label-floating">
                        {!! Form::label('medicamento', 'Medicamento Actual', ['class' => 'control-label']); !!}
                        {!! Form::text('medicamento',null, ['id' => 'medicamento', 'class' => 'form-control']); !!}                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group label-floating">
                        {!! Form::label('enfermedad', 'Enfermedad', ['class' => 'control-label']); !!}
                        {!! Form::text('enfermedad',null, ['id' => 'enfermedad', 'class' => 'form-control']); !!}                       
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
