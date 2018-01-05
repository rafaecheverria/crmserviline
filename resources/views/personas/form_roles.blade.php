<div class="instruction">
    <div class="row">
        <div class="col-md-4">
            <div class="picture center">
                <div id="image-modal"></div>
            </div>
        </div>
        <div class="col-md-8">
            {!! Form::model(['id' => 'update_doctor']); !!}
            {!! Form::text('id', null,['id' => 'id', 'hidden' => true]); !!} 
            <div class="row">
                <div class="col-md-12"> 
                    <div class="form-group label-floating">
                        {!! Form::text('rut', null, ['id' => 'rut', 'readonly', 'class' => 'form-control', 'placeholder' => 'Rut']); !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group label-floating">
                        {!! Form::text('nombres',null, ['id' => 'nombres', 'class' => 'form-control', 'placeholder' => 'Nombres']); !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group label-floating">
                        <select id="roles" name="roles" multiple="multiple" class="selectpicker2" data-style="select-with-transition">
                        </select>  
                        
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<p>If you have more questions, don't hesitate to contact us or send us a tweet @creativetim. We're here to help!</p>