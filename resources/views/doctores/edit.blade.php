@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">perm_identity</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Editar datos del doctor {{$doctor->apellidos}}
                        </h4>
                        {!! Form::model($doctor, ['id' => 'update_doctor']); !!}
                            {!! Form::hidden('id', null, ['id' => 'id']); !!} 
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
                            </div>
                            <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        {!! Form::label('apellidos', 'Apellidos'); !!}
                                        {!! Form::text('apellidos', null, ['class' => 'form-control']); !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        {!! Form::label('email', 'Email'); !!}
                                        {!! Form::text('email', null, ['class' => 'form-control']); !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        {!! Form::label('telefono', 'Teléfono'); !!}
                                        {!! Form::text('telefono', null, ['class' => 'form-control']); !!}
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
                                        {!! Form::label('nacimiento', 'Fecha de Nacimiento'); !!}
                                        {!! Form::date('nacimiento', null, ['class' => 'form-control']); !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        {!! Form::label('titulo', 'Título'); !!}
                                        {!! Form::text('titulo', null, ['class' => 'form-control']); !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        {!! Form::label('speciality_id', 'Especialidad'); !!}
                                         {!! Form::select('speciality_id', $select, null, ['class'=>'form-control']) !!}
                   
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('estudios_complementarios', 'Estudios Complementarios'); !!}
                                        <div class="form-group label-floating">
                                            {!! Form::textarea('estudios_complementarios',null,['class'=>'form-control', 'rows' => 4, 'cols' => 40]) !!}
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
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="#pablo">
                            <img class="img" src="{{ asset('assets/img/faces/marc.jpg') }}" />
                        </a>
                    </div>
                    <div class="card-content">
                        <h6 class="category text-gray">CEO / Co-Founder</h6>
                        <h4 class="card-title">Alec Thompson</h4>
                        <p class="description">
                            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                        </p>
                        <a href="#pablo" class="btn btn-rose btn-round">Follow</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection