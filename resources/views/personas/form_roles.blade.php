<div class="instruction">
    <div class="row">
        <div class="col-md-8">
            {!! Form::model(['id' => 'update_doctor']); !!}
            {!! Form::text('id', null,['id' => 'id', 'hidden' => true]); !!} 
            <div class="row">
                <div class="col-md-4"> 
                    <div class="form-group label-floating">
                        {!! Form::label('rut', 'Rut'); !!}
                        {!! Form::text('rut', null, ['readonly', 'class' => 'form-control']); !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group label-floating">
                        {!! Form::label('nombres', 'Nombres'); !!}
                        {!! Form::text('nombres',null, ['class' => 'form-control']); !!}
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group label-floating">
            <select id="roles" class="selectpicker" data-style="select-with-transition" multiple title="Choose City" data-size="7">
                                                        
                        </select>

                       
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-md-4">
            <div class="picture">
                <img src="../../assets/img/card-1.jpeg" alt="Thumbnail Image" class="img-rounded img-responsive">
            </div>
        </div>
    </div>
</div>
<p>If you have more questions, don't hesitate to contact us or send us a tweet @creativetim. We're here to help!</p>