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
                        <h4 class="card-title">Edit Profile -
                            <small class="category">Complete your profile</small>
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
                                        {!! Form::text('name',null, ['class' => 'form-control']); !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        {!! Form::label('apellidos', 'Apellidos'); !!}
                                        {!! Form::text('last_name', null, ['class' => 'form-control']); !!}
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
                                        {!! Form::label('phone', 'Teléfono'); !!}
                                        {!! Form::text('phone', null, ['class' => 'form-control']); !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        {!! Form::label('birth_date', 'Fecha de Nacimiento'); !!}
                                        {!! Form::date('birth_date', null, ['class' => 'form-control']); !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        {!! Form::label('address', 'Dirección'); !!}
                                        {!! Form::text('address', null, ['class' => 'form-control']); !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        {!! Form::label('title', 'Título'); !!}
                                        {!! Form::text('title', null, ['class' => 'form-control']); !!}
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
                                        {!! Form::label('complementary_studies', 'Estudios Complementarios'); !!}
                                        <div class="form-group label-floating">
                                            {!! Form::textarea('complementary_studies',$doctor->complementary_studies,['class'=>'form-control', 'rows' => 4, 'cols' => 40]) !!}
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