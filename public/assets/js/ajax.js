$(document).ready(function() {

    listar();
    listar_recepcionista();
    listar_personas();
    listar_pacientes();



    $('.card .material-datatables label').addClass('form-group');
    $('#nacimiento').datetimepicker({
        
    icons: {
        date: "fa fa-calendar",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'
    },
    format: 'DD-MM-YYYY',
});

$( "#btn_guardar_doc" ).click(function(event){ 
        event.preventDefault();
        var dataString  = $( '#form_doc' ).serializeArray();
        var route = "/admin/doctores";

        $.ajax({
            url: route,
            type: 'post',
            datatype: 'json',
            data:dataString,

            success:function(data){
                console.log(data.message);
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000});
                $('#form_doc')[0].reset();
            },
            error:function(data){
                var error = data.responseJSON.errors;
                for(var i in error){
                    for(var j in error[i]){
                        var message = error[i][j];
                        console.log(message);
                       $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000});
                    }
                }
            }
        });
    });
$( "#btn_guardar_rec" ).click(function(event){ 
        event.preventDefault();
        var dataString  = $( '#form_rec' ).serializeArray();
        var route = "/admin/recepcionistas";

        $.ajax({
            url: route,
            type: 'post',
            datatype: 'json',
            data:dataString,

            success:function(data){
                console.log(data.message);
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000});
                $('#form_doc')[0].reset();
            },
            error:function(data){
                var error = data.responseJSON.errors;
                for(var i in error){
                    for(var j in error[i]){
                        var message = error[i][j];
                        console.log(message);
                       $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000});
                    }
                }
            }
        });
    });
$( "#update_role_user" ).click(function(event){ 
        event.preventDefault()
        var id= $( '#id' ).val()
        var route = "/admin/roles/"+id+""
        var dataString  = $( '#form_update_roles_user' ).serializeArray()
       // alert(dataString)
        $.ajax({
            url: route,
            type: 'PUT',
            datatype: 'json',
            data:dataString,

            success:function(data){
                console.log(data.message)
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
                $('#roleModal').modal('toggle');
            },
            error:function(data){
                var error = data.responseJSON.errors;
                for(var i in error){
                    for(var j in error[i]){
                        var message = error[i][j];
                        console.log(message)
                       $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000})
                    }
                }
            }
        })  
    })

	$( "#btn_update_doc" ).click(function(event){ 
		event.preventDefault();
		var id= $( '#id' ).val();
		var route = "/admin/doctores/"+id+"";
		var dataString  = $( '#update_doctor' ).serializeArray();
		$.ajax({
			url: route,
			type: 'PUT',
			datatype: 'json',
			data:dataString,
			success:function(data){
				 $('.apellidos_up').html(data.apellidos);
				 $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000});
			},
             error:function(data){
              var error = data.responseJSON.errors;
                for(var i in error){
                    var message = error[i];
                    $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000});
                }
            }
		});
	});
    
$( "#btn_update_rec" ).click(function(event){ 
        event.preventDefault();
        var id= $( '#id' ).val();
        var route = "/admin/recepcionistas/"+id+"";
        var dataString  = $( '#update_recepcionista' ).serializeArray();
        $.ajax({
            url: route,
            type: 'PUT',
            datatype: 'json',
            data:dataString,
            success:function(data){
                 $('.apellidos_up').html(data.apellidos);
                 $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000});
            },
             error:function(data){
              var error = data.responseJSON.errors;
                for(var i in error){
                    var message = error[i];
                    $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000});
                }
            }
        });
    });
});

// Subir Imagen de Perfil
    var $avatarInput, $avatarImage, $avatarForm;
    var avatarUrl;

    $(function(){
    
        $avatarInput = $('#avatarInput');
        $avatarImage = $('.avatarImage');
        $avatarForm = $('#avatarForm');
        avatarUrl = "/admin/users/avatar";
        $id = $('#id').val();

        $avatarImage.on('click', function(){    
            $avatarInput.click();
        });
        
        $avatarInput.on('change', function(){

        var formData = new FormData();
        formData.append('avatar', $avatarInput[0].files[0]);

            $.ajax({
                url: avatarUrl+'?'+$avatarForm.serialize(),
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,

            beforeSend: function(){
                    $avatarImage.attr('src', '/assets/img/touchloader.gif');
            },
            success: function(data){
                if (data.success)
                    $avatarImage.attr('src', '/assets/img/perfiles/'+data.file_name+'?'+ new Date().getTime());
                    $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000});
            },
            error: function(data){
                var error = data.responseJSON.errors;
                for(var i in error){
                    var message = error[i];
                      $avatarImage.attr('src');
                      $avatarImage.attr('src', '/assets/img/perfiles/'+data.file_name+'?'+ new Date().getTime());
                     $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000});
                }
            }
        });

    });
});

//$.fn.dataTable.ext.errMode = 'throw';  //Esto permite que no aparezca el alert() cuando el servidor responde con un error.

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
    });
}

//$.fn.dataTable.ext.errMode = 'throw';  //Esto permite que no aparezca el alert() cuando el servidor responde con un error.
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
    });
        //$('.card .material-datatables label').addClass('form-group');
}

//$.fn.dataTable.ext.errMode = 'throw';  //Esto permite que no aparezca el alert() cuando el servidor responde con un error.
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
        ],
        'columnDefs': [{ }]
    });
        //$('.card .material-datatables label').addClass('form-group');
}

//$.fn.dataTable.ext.errMode = 'throw';  //Esto permite que no aparezca el alert() cuando el servidor responde con un error.
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
    });
}

function eliminar_doc(id)
{
    event.preventDefault();
    var popup = confirm("¿ Esta seguro de eliminar este registro ?")
    var route = "/admin/doctores/"+id+"";
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    if(popup ==true){
     $.ajax({
            url: route,
            type: 'POST',
            data: {'_method' : 'DELETE', '_token' : csrf_token},
            success:function(data){
                console.log(data);
                $('#datatables').DataTable().ajax.reload();
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000});
            }, 
            error:function(){
                alert('la operación falló');
            }
       });
    }
}

function roles_user(id)
{
   event.preventDefault();
   var route = "/admin/personas/"+id+"/edit";
   var csrf_token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
           url: route,
           type: 'GET',
        success:function(data){
            $('#id').val(data.id)
            $('#rut').val(data.rut)
            $('#nombres').val(data.nombres)
            $('.title-name').html(data.nombres +' '+ data.apellidos)
            $('#image-modal').html('<img src="/assets/img/perfiles/'+data.avatar+'" alt="Thumbnail Image" class="img-rounded img-responsive">')
            const crearOption = (value, name, selected) => `<option value="${value}"${selected.includes(value) ? ' selected' : ''}>${name}</option>`
            const obj = data.roles
            const values = Object.keys(obj)
            const opciones = values.map(x => crearOption(x, obj[x], data.my_roles))
            const select = document.getElementById('role')
                 select.innerHTML = ''
                 opciones.forEach(x => { select.insertAdjacentHTML('beforeend', x) })
            const valor = data.my_roles
                 i = 0, size = valor.length
                      for(i; i < size; i++){
                    $('select option[value='+valor[i]+']').attr('selected', 'selected')
                }
           $('.selectpicker2').selectpicker('refresh')
          },
       error:function(){
           alert('la operación falló');
          }
    });
}

function antecedentes_personales(id)
{

    //alert(id)
   /*event.preventDefault();
   var route = "/admin/personas/"+id+"/edit";
   var csrf_token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
           url: route,
           type: 'GET',
        success:function(data){
            $('#id').val(data.id)
            $('#rut').val(data.rut)
            $('#nombres').val(data.nombres)
            $('.title-name').html(data.nombres +' '+ data.apellidos)
            $('#image-modal').html('<img src="/assets/img/perfiles/'+data.avatar+'" alt="Thumbnail Image" class="img-rounded img-responsive">')
            const crearOption = (value, name, selected) => `<option value="${value}"${selected.includes(value) ? ' selected' : ''}>${name}</option>`
            const obj = data.roles
            const values = Object.keys(obj)
            const opciones = values.map(x => crearOption(x, obj[x], data.my_roles))
            const select = document.getElementById('role')
                 select.innerHTML = ''
                 opciones.forEach(x => { select.insertAdjacentHTML('beforeend', x) })
            const valor = data.my_roles
                 i = 0, size = valor.length
                      for(i; i < size; i++){
                    $('select option[value='+valor[i]+']').attr('selected', 'selected')
                }
           $('.selectpicker2').selectpicker('refresh')
          },
       error:function(){
           alert('la operación falló');
          }
    });*/
}

function eliminar_recep(id)
{
    event.preventDefault();
    var popup = confirm("¿ Esta seguro de eliminar este registro ?")
    var route = "/admin/recepcionistas/"+id+"";
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    if(popup ==true){
     $.ajax({
            url: route,
            type: 'POST',
            data: {'_method' : 'DELETE', '_token' : csrf_token},
            success:function(data){
                $('#recepcionistas').DataTable().ajax.reload();
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000});
            }, 
            error:function(){
                alert('la operación falló');
            }
       });
 }
}