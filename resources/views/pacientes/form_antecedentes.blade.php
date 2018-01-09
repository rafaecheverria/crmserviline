<div class="instruction">
    <div class="row">
        <div class="col-md-4">
            <div class="picture center">
                <div id="image-modal"></div>
            </div>
        </div>
        <div class="col-md-8">
            {!! Form::open(['id' => 'form_antecedente_paciente']); !!}
            {!! Form::text('id', null,['id' => 'id', 'hidden' => true]); !!} 
            <div class="row">
                <div class="col-md-12"> 
                    <div class="form-group label-floating">
                        {!! Form::label('sangre', 'Sangre'); !!}
                        {!! Form::text('sangre', null, ['id' => 'sangre', 'readonly', 'class' => 'form-control', 'placeholder' => 'Rut']); !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group label-floating">
                        {!! Form::label('vih', 'VIH'); !!}
                        {!! Form::text('vih',null, ['id' => 'vih', 'class' => 'form-control', 'placeholder' => 'Nombres']); !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group label-floating">
                        {!! Form::label('peso', 'Peso'); !!}
                        {!! Form::text('peso',null, ['id' => 'peso', 'class' => 'form-control', 'placeholder' => 'Nombres']); !!}                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group label-floating">
                        {!! Form::label('altura', 'Altura'); !!}
                        {!! Form::text('altura',null, ['id' => 'altura', 'class' => 'form-control', 'placeholder' => 'Nombres']); !!}                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group label-floating">
                        {!! Form::label('peso', 'Peso'); !!}
                        {!! Form::text('peso',null, ['id' => 'peso', 'class' => 'form-control', 'placeholder' => 'Nombres']); !!}                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group label-floating">
                        {!! Form::label('alergia', 'Alergia'); !!}
                        {!! Form::text('alergia',null, ['id' => 'alergia', 'class' => 'form-control', 'placeholder' => 'Nombres']); !!}                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group label-floating">
                        {!! Form::label('medicamento_actual', 'Medicamento'); !!}
                        {!! Form::text('medicamento_actual',null, ['id' => 'medicamento_actual', 'class' => 'form-control', 'placeholder' => 'Nombres']); !!}                       
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
