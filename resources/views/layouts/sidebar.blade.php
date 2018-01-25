<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="{{ asset('assets/img/sidebar-1.jpg') }}">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text">
            DOCLICK
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
                <img src="/assets/img/perfiles/{{ Auth::User()->avatar }}" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    {{Auth::User()->nombres}} {{Auth::User()->apellidos}}
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
                <a href="{{ url('admin/pacientes') }}">
                    <i class="material-icons">account_box</i>
                    <p>Pacientes</p>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/citas') }}">
                    <i class="material-icons">date_range</i>
                    <p>Citas Médicas</p>
                </a>
            </li>
            <li>
                <a href="{{url('admin/consultas')}}">
                    <i class="material-icons">chrome_reader_mode</i>
                    <p>Consultas Médicas</p>
                </a>
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
                            <a href="{{ url('admin/clinica') }}">Clinica</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/personas') }}">Personas</a>
                        </li>
                        <li>
                            <a href="#">Roles</a>
                        </li>
                        <li>
                            <a href="#">Permisos</a>
                        </li>
                        <li>
                            <a href="#">Especialidades</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
