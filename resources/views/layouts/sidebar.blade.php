<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="{{ asset('assets/img/sidebar.jpg') }}">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text">
            DOCLICK
        </a>
    </div>
    <div class="logo logo-mini">
        <a href="http://www.creative-tim.com" class="simple-text">
            Dc
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">

            <form id="formAvatar" method="post">
                {{ csrf_field() }}
                <input type="text" name="id" id="id_img" value="{{Auth::User()->id}}" class="hidden">
                <input type="file" id="txt_input" name="avatar" class="hidden">
            </form>
             <a href="#">
            <div class="photo">
                <img src="/assets/img/perfiles/{{ Auth::User()->avatar }}" class="img-responsive avatar_img" />
            </div>
        </a>

            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    {{Auth::User()->nombres}} {{Auth::User()->apellidos}}
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#" data-toggle="modal" data-target="#modal_micuenta">Mis Datos</a>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#modal_miclave">Cambiar Clave</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li>
                <a href="{{url('/')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Inicio</p>
                </a>
            </li>
            @permission('leer-pacientes')
                 <li>
                <a href="{{ url('pacientes') }}">
                    <i class="material-icons">account_box</i>
                    <p>Pacientes</p>
                </a>
            </li>
            @endpermission
           @permission('leer-citas')
            <li>
                <a href="{{url('consultas')}}">
                    <i class="material-icons">chrome_reader_mode</i>
                    <p>Consultas Médicas
                    </p>
                </a>
            </li>
            @endpermission
            @permission('leer-mantenimientos')
            <li>
                <a data-toggle="collapse" href="#settings">
                    <i class="material-icons">settings</i>
                    <p>Mantenimiento
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="settings">
                    <ul class="nav">
                        @permission('leer-doctores')
                        <li>
                            <a href="{{ url('doctores') }}">Doctores</a>
                        </li>
                        @endpermission
                        @permission('leer-recepcionistas')
                        <li>
                            <a href="{{ url('recepcionistas') }}">Recepcionistas</a>
                        </li>
                        @endpermission
                        @permission('leer-especialidades')
                        <li>
                            <a href="{{ url('especialidades') }}">Especialidades</a>
                        </li>
                        @endpermission
                    </ul>
                </div>
            </li>
            @endpermission
             @permission('leer-configuraciones')
            <li>
                <a data-toggle="collapse" href="#configuracion">
                    <i class="material-icons">build</i>
                    <p>Configuración
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="configuracion">
                    <ul class="nav">
                        @permission('leer-clinicas')
                        <li>
                            <a href="{{ url('clinica') }}">Clinica</a>
                        </li>
                        @endpermission
                        @permission('leer-personas')
                        <li>
                            <a href="{{ url('personas') }}">Personas</a>
                        </li>
                        @endpermission
                        @permission('leer-roles')
                        <li>
                            <a href="{{ url('roles') }}">Roles</a>
                        </li>
                        @endpermission
                        @permission('leer-permisos')
                        <li>
                            <a href="{{ url('permisos') }}">Permisos</a>
                        </li>
                        @endpermission
                    </ul>
                </div>
            </li>
            @endpermission
        </ul>
    </div>
</div>
@include('../personas/modal_cuenta')
@include('../clave/perfil')
