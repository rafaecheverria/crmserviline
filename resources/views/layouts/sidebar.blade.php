<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="{{ asset('assets/img/sidebar-1.jpg') }}">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text">
            Creative Tim
        </a>
    </div>
    <div class="logo logo-mini">
        <a href="http://www.creative-tim.com" class="simple-text">
            Ct
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ asset('assets/img/faces/avatar.jpg') }}" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    Tania Andrew
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#">Mi Cuenta</a>
                        </li>
                        <li>
                            <a href="#">Edit Profile</a>
                        </li>
                        <li>
                            <a href="#">Settings</a>
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
            <li>
                <a href="{{url('/')}}">
                    <i class="material-icons">assignment</i>
                    <p>Consultas</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#especialidades">
                    <i class="material-icons">person</i>
                    <p>Especialidades
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="especialidades">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('doctores') }}">Sub-Epecialidades</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#personas">
                    <i class="material-icons">person</i>
                    <p>Personas
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="personas">
                    <ul class="nav">
                        @role('administrador')
                            <li>
                                <a href="{{ url('admin/doctores') }}">Doctores</a>
                            </li>
                        @endrole
                        <li>
                            <a href="{{ url('admin/recepcionistas') }}">Recepcionistas</a>
                        </li>
                        <li>
                            <a href="#">Pacientes</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#settings">
                    <i class="material-icons">settings</i>
                    <p>Configuración
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="settings">
                    <ul class="nav">
                        <li>
                            <a href="#">Roles</a>
                        </li>
                        <li>
                            <a href="#">Permisos</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
