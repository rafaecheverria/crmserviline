$(document).ready(function() {
	listar_doctores()
    listar_recepcionistas()
    listar_personas()
    listar_contactos()
    listar_organizaciones()
    listar_especialidades()
    listar_permisos()
    listar_roles()
    listar_citas_pendientes()
    listar_citas_atendidas()
})

var listar_permisos = function()
{
    var table = $('#table_permisos').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "fixedHeader": true,
        "order": [[ 1, "asc" ]],
        "ajax": {
             "url": "permisos/show",
            },
        "pagingType": "simple_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        "language": {
            url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        "responsive": true,
        "columns":[
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'name', name: 'name'}
        ]
    })
}
var listar_roles = function()
{
    var table = $('#table_roles').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "fixedHeader": true,
        "order": [[ 1, "asc" ]],
        "ajax": {
             "url": "roles/show",
            },
        "pagingType": "simple_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        "language": {
            url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        "responsive": true,
        "columns":[
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'name', name: 'name'}
        ]
    })
}
var listar_especialidades = function()
{
    var table = $('#table_especialidades').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "fixedHeader": true,
        "order": [[ 1, "asc" ]],
        "ajax": {
             "url": "especialidades/show",
            },
        "pagingType": "simple_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        "language": {
            url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        "responsive": true,
        "columns":[
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'nombre', name: 'nombre'}
        ]
    })
}
var listar_doctores = function()
{
    var table = $('#table_doctores').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "fixedHeader": true,
        "order": [[ 3, "asc" ]],
        "ajax": {
             "url": "doctores/show",
            },
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        "language": {
            url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        "responsive": true,
        "columns":[
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'rut', name: 'rut'},
            {data: 'nombres', name: 'nombres'},
            {data: 'apellidos', name: 'apellidos'},
            {data: 'email', name: 'email'}
        ]
	})
}
var listar_recepcionistas = function()
{
    var table = $('#table_recepcionistas').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "fixedHeader": true,
        "order": [[ 3, "asc" ]],
        "ajax": {
             "url": "recepcionistas/show",
            },
        "pagingType": "simple_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        "language": {
            url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        //"responsive": true,
        "columns":[
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'rut', name: 'rut'},
            {data: 'nombres', name: 'nombres'},
            {data: 'apellidos', name: 'apellidos'},
            {data: 'email', name: 'email'}
        ]
	})
}
var listar_citas_pendientes = function()
{
    var table = $('#pendientes').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "fixedHeader": true,
        "bInfo": false,
        "order": [[ 1, "desc" ]],
        "ajax": {
             "url": "consultas/show",
            },
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        "language": {
            url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json",
        },
        "responsive": true,
        "columns":[
            {data: 'action', name: 'action', orderable: false, searchable: false, class:"text-left"},
            {data: 'fecha_inicio', name: 'fecha_inicio'},
            {data: 'paciente', name: 'paciente.apellidos'},
            {data: 'doctor', name: 'doctor.apellidos'},
            {data: 'especialidad', name: 'especialidad.nombre'},
        ],
	})
}
var listar_citas_atendidas = function()
{
    var table = $('#table_atendidos').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "fixedHeader": true,
        "bInfo": false,
        "order": [[ 1, "desc" ]],
        "ajax": {
             "url": "consultas-carga",
            },
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        "language": {
            url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json",
        },
        "responsive": true,
        "columns":[
            {data: 'action', name: 'action', orderable: false, searchable: false, class:"text-left"},
            {data: 'fecha_inicio', name: 'fecha_inicio'},
            {data: 'paciente', name: 'paciente.apellidos'},
            {data: 'doctor', name: 'doctor.apellidos'},
            {data: 'especialidad', name: 'especialidad.nombre'},
        ],
    })
}
var listar_contactos = function()
{
    var table = $('#contactos').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "fixedHeader": true,
        "order": [[ 3, "asc" ]],
        "ajax": {
             "url": "contactos/show",
            },

        "pagingType": "simple_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        "language": {
            url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json",
            search: "_INPUT_",
            class: "form-group",
        },
        "responsive": true,
        "columns":[
            {data: 'action', name: 'action', orderable: false, searchable: false, class:"text-left"},
            {data: 'rut', name: 'rut'},
            {data: 'nombres', name: 'nombres'},
            {data: 'apellidos', name: 'apellidos'},
            {data: 'telefono', name: 'telefono'},
            {data: 'nacimiento', name: 'nacimiento'}
        ]
	})
        //$('.material-datatables label').addClass('form-group');
}
var listar_organizaciones = function()
{
    var table = $('#organizaciones').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "fixedHeader": true,
        "retrieve": true,
        "order": [[ 3, "asc" ]],
        "ajax": {
             "url": "organizaciones/show",
            },

        "pagingType": "simple_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        "language": {
            url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        //"responsive": true,
        "columns":[
            {data: 'action', name: 'action', orderable: false, searchable: false, class:"text-left"},
            {data: 'rut', name: 'organizaciones.rut'},
            {data: 'nombre', name: 'organizaciones.nombre'},
            {data: 'telefono', name: 'organizaciones.telefono'},
            {data: 'email', name: 'organizaciones.email'},   
            {data: 'estado', name: 'estados.estado'},
            {data: 'desactivar', name: 'desactivar'},
        ]
    })
}
var listar_personas = function()
{
    var table = $('#personas').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "fixedHeader": true,
        "order": [[ 2, "asc" ]],
        "ajax": {
             "url": "personas/show",
            },
        "pagingType": "simple_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        "language": {
            url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        //"responsive": true,
        "columns":[
            {data: 'rut', name: 'rut'},
            {data: 'nombres', name: 'nombres'},
            {data: 'apellidos', name: 'apellidos'},
            {data: 'email', name: 'email'},
            {data: 'roles', name: 'roles'},
            {data: 'action', name: 'action', orderable: false, searchable: false, class:"text-right"}
        ],
    })
}
