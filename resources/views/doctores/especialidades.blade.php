<div class="col-md-12">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <img alt="Thumbnail Image" class="img-rounded img-responsive img_doc">
            </div>
        </div>
        <div class="col-md-8">
            <table class="table">
                <tbody>
                    <tr>
                        <th>Rut:</th>
                        <td id="rut"></td>
                    </tr>
                    <tr>
                        <th>Doctor:</th>
                        <td id="nombres"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <form id="form_especielidades_doctor" class="sinpadding">
                <input id="id_especialidad" name="id_especialidad" hidden="true" />
                <div class="col-md-12">
                    <div class="form-group label-floating">
                        <label>Especialidades</label>
                        <select id="especialidades_doctor" name="especialidades_doctor[]" multiple="multiple" class="selectpicker" data-style="select-with-transition">
                        </select>                       
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">ESTUDIOS COMPLEMENTARIOS</label>
                        <textarea rows="6" type="text" class="form-control" id="estudios_complementarios" name="estudios_complementarios"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>