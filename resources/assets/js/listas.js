$(document).ready(function() {
    listar_personas()
    listar_contactos()
    listar_vendedores()
    listar_organizaciones()
    listar_permisos()
    listar_roles()
    listar_categorias()
    listar_productos()
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
var listar_categorias = function()
{
    var table = $('#categorias').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "fixedHeader": true,
        "order": [[ 1, "asc" ]],
        "ajax": {
             "url": "categorias/show",
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
            {data: 'categoria', name: 'categoria'}
        ]
    })
}

var listar_productos = function()
{
    var table = $('#productos').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "fixedHeader": true,
        "order": [[ 3, "asc" ]],
        "ajax": {
             "url": "productos/show",
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

            {

            "render": function (data, type, JsonResultRow, meta) {

                return "<img src='assets/img/productos/"+JsonResultRow.imagen+"' class='img-circle' width='30px'>";

                }
            },
            
            {data: 'codigo', name: 'codigo'},
            {data: 'descripcion', name: 'descripcion'},
            {data: 'categoria', name: 'categorias.categoria'},
            {data: 'stock', name: 'stock'},
            {data: 'precio_compra', name: 'precio_compra'},
            {data: 'precio_venta', name: 'precio_venta'},
            {data: 'created_at', name: 'created_at'}

        ]
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
var listar_vendedores = function()
{
    var table = $('#vendedores').DataTable({
        "headers": {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
        "processing": true,
        "serverSide": true,
        "fixedHeader": true,
        "order": [[ 3, "asc" ]],
        "ajax": {
             "url": "vendedores/show",
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
        "order": [[ 2, "asc" ]],
        "columnDefs": [ //define el ancho de las columnas de la tabla.
            { "width": "10%", "targets": 0 },
            { "width": "10%", "targets": 1 },
            { "width": "40%", "targets": 2 },
            { "width": "10%", "targets": 3 },
            { "width": "10%", "targets": 4 },
            { "width": "10%", "targets": 5 },
            { "width": "10%", "targets": 6 },
          ],
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

    console.log(table)
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
