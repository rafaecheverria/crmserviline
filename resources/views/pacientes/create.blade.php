@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue">
                        <i class="material-icons">perm_identity</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Crear Recepcionista</h4>
                        {!! Form::open(['method' => 'POST','id' => 'form_doc']); !!}
                                <div class="row">
                                    <div class="col-md-6"> 
                                        <div class="form-group label-floating">
                                              {!! Form::label('rut', 'Rut', ['class' => 'control-label ']); !!}
                                              {!! Form::text('rut', null, ['class' => 'form-control']); !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            {!! Form::label('nombres', 'Nombres', ['class' => 'control-label']); !!}
                                            {!! Form::text('nombres',null, ['class' => 'form-control']); !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                     <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            {!! Form::label('apellidos', 'Apellidos', ['class' => 'control-label']); !!}
                                            {!! Form::text('apellidos', null, ['class' => 'form-control']); !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            {!! Form::label('email', 'Email', ['class' => 'control-label']); !!}
                                            {!! Form::text('email', null, ['class' => 'form-control']); !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            {!! Form::label('direccion', 'Dirección', ['class' => 'control-label']); !!}
                                            {!! Form::text('direccion', null, ['class' => 'form-control']); !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            {!! Form::label('telefono', 'Teléfono', ['class' => 'control-label']); !!}
                                            {!! Form::text('telefono', null, ['class' => 'form-control']); !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            {!! Form::label('nacimiento', 'Fecha de Nacimiento', ['class' => 'control-label']); !!}
                                            {!! Form::text('nacimiento', 'dd-mm-aaaa', ['class' => 'form-control']); !!}
                                        </div>
                                    </div>
                                </div> 
                            <div class="clearfix"></div>
                       {!! Form::close() !!}
                       {!! link_to('#','Guardar',['id' => 'btn_guardar_rec' , 'class' => 'btn btn-info pull-right']); !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection