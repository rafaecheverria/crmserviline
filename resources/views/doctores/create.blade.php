@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">perm_identity</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Crear Doctor</h4>
                        {!! Form::open(['method' => 'POST','id' => 'form_doc']); !!}
                                <div class="row">
                                    <div class="col-md-4"> 
                                        <div class="form-group label-floating">
                                              {!! Form::label('rut', 'Rut'); !!}
                                              {!! Form::text('rut', null, ['class' => 'form-control']); !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            {!! Form::label('nombres', 'Nombres'); !!}
                                            {!! Form::text('nombres',null, ['class' => 'form-control']); !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            {!! Form::label('apellidos', 'Apellidos'); !!}
                                            {!! Form::text('apellidos', null, ['class' => 'form-control']); !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            {!! Form::label('email', 'Email'); !!}
                                            {!! Form::text('email', null, ['class' => 'form-control']); !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            {!! Form::label('direccion', 'Dirección'); !!}
                                            {!! Form::text('direccion', null, ['class' => 'form-control']); !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            {!! Form::label('telefono', 'Teléfono'); !!}
                                            {!! Form::text('telefono', null, ['class' => 'form-control']); !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            {!! Form::label('nacimiento', 'Fecha de Nacimiento'); !!}
                                            {!! Form::text('nacimiento', null, ['class' => 'form-control']); !!}
                                        </div>
                                    </div>
                                     <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            {!! Form::label('titulo', 'Título'); !!}
                                            {!! Form::text('titulo', null, ['class' => 'form-control']); !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            {!! Form::label('speciality_id', 'Especialidad'); !!}
                                        {!! Form::select('speciality_id', $especialidades, null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('estudios_complementarios', 'Estudios Complementarios'); !!}
                                            <div class="form-group label-floating">
                                                {!! Form::textarea('estudios_complementarios',null,['class'=>'form-control', 'rows' => 3, 'cols' => 40]) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="clearfix"></div>
                       {!! Form::close() !!}
                       {!! link_to('#','Actualizar',['id' => 'btn_update_doc' , 'class' => 'btn btn-rose pull-right']); !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection