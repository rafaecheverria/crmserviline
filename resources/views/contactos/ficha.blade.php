<div class="col-md-12">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <img alt="Thumbnail Image" class="img-rounded img-responsive img_pac">
            </div>
            <br>
            <div class="row">
                <ul class="nav nav-pills nav-pills-info nav-stacked">
                    <li class="active">
                        <a href="#basica" data-toggle="tab">Básica</a>
                    </li>
                     @role(['administrador', 'doctor']) <!-- al terminar esta sección debemos manejar estos datos con abilidades y persmisos a cada perfil "administrador", "doctor", 
                    "recepcionista", "paciente"-->
                    <li>
                        <a href="#personal" data-toggle="tab">Personal</a>
                    </li>
                    @endrole
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            <div class="tab-content">
                <div class="tab-pane active" id="basica">
                    <table class="table">
                            <tbody>
                                <tr>
                                    <th>Rut:</th>
                                    <td id="rut"></td>
                                </tr>
                                <tr>
                                    <th>Paciente:</th>
                                    <td id="nombres"></td>
                                </tr>
                                <tr>
                                    <th>Edad:</th>
                                    <td id="edad"></td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td id="email"></td>
                                </tr>
                                <tr>
                                    <th>Teléfono:</th>
                                    <td id="telefono"></td>
                                </tr>
                                <tr>
                                    <th>Género:</th>
                                    <td id="genero"></td>
                                </tr>
                                <tr>
                                    <th>Dirección:</th>
                                    <td id="direccion"></td>
                                </tr>
                            </tbody>
                        </table>
                </div>
                <div class="tab-pane" id="personal">
                    <table class="table">
                            <tbody class="text-left">
                                <tr>
                                    <th>Sangre:</th>
                                    <td id="sangre2"></td>
                                </tr>
                                <tr>
                                    <th>Vih:</th>
                                    <td id="vih2"></td>
                                </tr>
                                <tr>
                                    <th>Peso:</th>
                                    <td id="peso2"></td>
                                </tr>
                                <tr>
                                    <th>Estatura:</th>
                                    <td id="altura2"></td>
                                </tr>
                                <tr>
                                    <th>Alergia:</th>
                                    <td id="alergia2"></td>
                                </tr>
                                <tr>
                                    <th>Medicamento:</th>
                                    <td id="medicamento2"></td>
                                </tr>
                                <tr>
                                    <th>Enfermedad:</th>
                                    <td id="enfermedad2"></td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>