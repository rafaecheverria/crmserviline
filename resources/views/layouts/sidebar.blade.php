<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="{{ asset('images/sidebar.jpg') }}">

    <div class="logo">

        <a href="#" class="simple-text">

            CRM SERVILINE

        </a>

    </div>

    <div class="logo logo-mini">

        <a href="#" class="simple-text">

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

                    <img src="images/perfiles/{{ Auth::User()->avatar }}" class="img-responsive avatar_img" />

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

            @permission('leer-empresas')

            <li>

                <a data-toggle="collapse" href="#empresas">

                    <i class="material-icons">graphic_eq</i>

                    <p>

                        <b class="caret"></b>

                            CRM

                    </p>

                </a>

                <div class="collapse" id="empresas">

                    <ul class="nav">

                        <li>

                            <a href="{{ url('panel') }}">

                                <i class="material-icons">list_alt</i>

                                <p>Panel</p>

                            </a>

                        </li>

                        <li>

                            <a href="{{ url('organizaciones') }}">

                                <i class="material-icons">business</i>

                                <p>Empresas</p>

                            </a>

                        </li>

                        <li>

                            <a href="{{ url('contactos') }}">

                                <i class="material-icons">contact_phone</i>

                                <p>Contactos</p>

                            </a>

                        </li>

                    </ul>

                </div>

            </li>

            @endpermission

            @permission('leer-ventas')

            <li>

                <a data-toggle="collapse" href="#ventas">

                    <i class="material-icons">attach_money</i>

                    <p>

                        Ventas

                        <b class="caret"></b>

                    </p>

                </a>

                <div class="collapse" id="ventas">

                    <ul class="nav">

                        

                        <li>

                            <a href="#">

                                <i class="material-icons">business</i>

                                <p>Crear Ventas</p>

                            </a>

                        </li>

                        <li>

                            <a href="#">

                                <i class="material-icons">business</i>

                                <p>Gestión Facturas</p>

                            </a>

                        </li>

                        <li>

                            <a href="#">

                                <i class="material-icons">business</i>

                                <p>Reportes</p>

                            </a>

                        </li>

                    </ul>

                </div>

            </li>

            @endpermission

            @permission('leer-productos')

            <li>

                <a href="{{url('productos')}}">

                    <i class="material-icons">shopping_basket</i>

                    <p>

                        Productos

                    </p>

                </a>

            </li>

            @endpermission

             @permission('leer-productos')

             <li>

                <a href="{{url('categorias')}}">

                    <i class="material-icons">category</i>

                    <p>

                        Categorias

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

                        @permission('leer-vendedores')

                        <li>

                            <a href="{{ url('vendedores') }}">

                                <i class="material-icons">supervisor_account</i>

                                <p>Vendedores</p>

                            </a>

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

                    <p>

                        Configuración

                        <b class="caret"></b>

                    </p>

                </a>

                <div class="collapse" id="configuracion">

                    <ul class="nav">

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
