@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col s12 m4">
            {!! Form::open(['method' => 'POST', 'files' => true,'id' => 'avatarForm']); !!}
            <div class="file-field input-field">
                {!! Form::text('id', $recepcionista->id,['id' => 'id', 'hidden' => true]); !!} 
              {!! Form::file('avatar', ['id' => 'avatarInput', 'class' => 'hidden']); !!}         
              <div class="file-path-wrapper">
                <input class="file-path validate" name="avatar" hidden="true" placeholder="Selecciona una imagen">     
              </div>
            </div>
            {!! Form::close() !!} 
          </div>
            <div class="col-md-126">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">perm_identity</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Recepcionista - <span class="apellidos_up">{{$recepcionista->apellidos}}</span></h4>
                        {!! Form::model($recepcionista, ['id' => 'update_recepcionista']); !!}
                            {!! Form::text('id', $recepcionista->id,['id' => 'id', 'hidden' => true]); !!} 
                            <div class="row">
                                <div class="col-md-2 col-md-offset-10">
                                    <div class="card-profile">
                                        <div class="card-avatar">
                                           <div id="cargando">
                                                <a href="#">
                                                    <img class="img avatarImage" src="/assets/img/perfiles/{{ $recepcionista->avatar }}" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"> 
                                    <div class="form-group label-floating">
                                        {!! Form::label('rut', 'Rut'); !!}
                                        {!! Form::text('rut', null, ['readonly', 'class' => 'form-control']); !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        {!! Form::label('nombres', 'Nombres'); !!}
                                        {!! Form::text('nombres',null, ['class' => 'form-control']); !!}
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        {!! Form::label('apellidos', 'Apellidos'); !!}
                                        {!! Form::text('apellidos', null, ['class' => 'form-control']); !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        {!! Form::label('email', 'Email'); !!}
                                        {!! Form::text('email', null, ['class' => 'form-control']); !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        {!! Form::label('direccion', 'Dirección'); !!}
                                        {!! Form::text('direccion', null, ['class' => 'form-control']); !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        {!! Form::label('nacimiento', 'Fecha de Nacimiento'); !!}
                                        {!! Form::text('nacimiento', null, ['class' => 'form-control']); !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        {!! Form::label('telefono', 'Teléfono'); !!}
                                        {!! Form::text('telefono', null, ['class' => 'form-control']); !!}
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                       {!! Form::close() !!}
                       {!! link_to('#','Actualizar',['id' => 'btn_update_rec' , 'class' => 'btn btn-rose pull-right']); !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection