$(document).ready(function() {
	listar()
    listar_recepcionista()
    listar_personas()
    listar_pacientes()
    citas_pendientes()
})

var listar = function()
{
    var table = $('#datatables').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "order": [[ 2, "asc" ]],
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
        //"responsive": true,
        "columns":[
            {data: 'rut', name: 'rut'},
            {data: 'nombres', name: 'nombres'},
            {data: 'apellidos', name: 'apellidos'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
	})
}
var listar_recepcionista = function()
{
    var table = $('#recepcionistas').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "order": [[ 2, "asc" ]],
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
            {data: 'rut', name: 'rut'},
            {data: 'nombres', name: 'nombres'},
            {data: 'apellidos', name: 'apellidos'},
            {data: 'roles', name: 'roles.name'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
	})
}
var citas_pendientes = function()
{
    var table = $('#pendientes').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "bInfo": false,
        "order": [[ 2, "asc" ]],
        "ajax": {
             "url": "consultas/show",
            },
        "pagingType": "simple_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        "language": {
            url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json",
        },
        //"responsive": true,
        "columns":[
            {data: 'action', name: 'action', orderable: false, searchable: false, class:"text-left"},
            {data: 'nombres', name: 'nombres'},
            {data: 'apellidos', name: 'apellidos'},
        ],
	})
}
var listar_pacientes = function()
{
    var table = $('#pacientes').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "order": [[ 2, "asc" ]],
        "ajax": {
             "url": "pacientes/show",
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
            {data: 'nombres', name: 'nombres'},
            {data: 'apellidos', name: 'apellidos'},
            {data: 'telefono', name: 'telefono'},
            {data: 'nacimiento', name: 'nacimiento'}
        ]
	})
}

var listar_personas = function()
{
    var table = $('#personas').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
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
            {data: 'action', name: 'action', orderable: false, searchable: false, class:"text-right"}
        ],
    })
}
