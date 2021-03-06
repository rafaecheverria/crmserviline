function redirect(ruta)
{
    window.location = ruta;
    //setTimeout("location."+ruta, 5000);
}
$(document).ready(function() {

    $('#rut').Rut({ //rut del login

       on_error: function(){ 

            $.notify({icon: "add_alert", message: "El rut tiene un formato que no es correcto, por favor verifique e intente nuevamente"},{type: 'danger', timer: 1000})

                $('#rut').val("")

                $('#rut').focus()

             },

      format_on: 'keyup'

    })

    $('#rut_user').Rut({ //rut del formuario contacto y vendedor

       on_error: function(){ 

            $.notify({icon: "add_alert", message: "El rut tiene un formato que no es correcto, por favor verifique e intente nuevamente"},{type: 'danger', timer: 1000})

                $('#rut_user').val("")

                $('#rut_user').focus()

             },

      format_on: 'keyup'

    })


var valor, contador, parrafo;  
// Mostramos un mensaje inicial y lo añadimos al div de id contador.  
$('<p class="indicador">Tienes 500 caracteres restantes</p>').appendTo('.contador')
// Definimos el evento para que detecte cada vez que se presione una tecla.  
$('.nota').keydown(function(){  
// Redefinimos el valor de contador al máximo permitido (150).  
contador = 500;  
/* Quitamos el párrafo con clase advertencia o indicador, en caso de que ya se 
   haya mostrado un mensaje */  
$('.advertencia').remove()

$('.indicador').remove() 
// Tomamos el valor actual del contenido del área de texto  
valor = $('.nota').val().length;  
// Descontamos ese valor al máximo.  
contador = contador - valor;  
/* Dependiendo de cuantos caracteres quedan, mostraremos el mensaje de una 
   u otra forma (lo definiremos a continuación mediante CSS */  
if(contador < 0) {  
   parrafo = '<p class="advertencia">';  
}else{  
   parrafo = '<p class="indicador">';  
}  
// Mostramos el mensaje con el número de caracteres restantes.  
$('.contador').append(parrafo + 'Tienes ' + contador + ' caracteres restantes</p>');  
  
});  

$('#modal_estado').on('shown.bs.modal', function () {
    $('#nota').focus();
})
$('#modal_contacto').on('shown.bs.modal', function () {
    $('#rut_user').focus();
})
$('#modal_cambiar_estado').on('shown.bs.modal', function () {
    $('.nota').focus();
})

$('#modal_contacto').on('shown.bs.modal', function () {
    $('#nombres_user').focus();
})

$('#modal_cargo').on('shown.bs.modal', function () {
    $('#nombre_cargo').focus();
})


$('[data-toggle="tooltip"]').tooltip()

$('.datepicker').datetimepicker({
        format: 'DD-MM-YYYY',
        locale:'es',
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove',
            inline: true
        }
     });

$('.timepicker').datetimepicker({
//      format: 'H:mm',    // use this format if you want the 24hours timepicker
        format: 'HH:mm',    //use this format if you want the 12hours timpiecker with AM/PM toggle
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove',
            inline: true

        }
     });

    $("#limpiar").click(function(){
        $("#nombre").val("")
        $("#btn-guardar").html('<a href="#" onclick="guardar_especialidad();" class="btn btn-fill btn-success">Guardar</a>')
    })


 $("#region_id").change(function(event){ //carga las Ciudades en el select #ciudad_id según la región elegida.
    $("#display").hide();
    var id = event.target.value;
    if (!id) 
        $("#ciudad_id").html("<option>--Seleccione--</option>")
        $('.selectpicker').selectpicker('refresh') //refresca el select para que cambie su valor
        $.get("get-ciudad/"+id+"",function(response,region){
        $("#ciudad_id").empty()
        $('.selectpicker').selectpicker('refresh') //refresca el select para que cambie su valor
        if (response == "") {
             $("#ciudad_id").html("<option>--Seleccione--</option>");
              $('.selectpicker').selectpicker('refresh') //refresca el select para que cambie su valor
        }else{
             $("#ciudad_id").html("<option value='0'>--Seleccione--</option>");
            for(i = 0; i <response.length; i++) {
                $("#ciudad_id").append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>")
            }
            $("#ciudad-show").show()
            $('.selectpicker').selectpicker('refresh') //refresca el select para que cambie su valor
        }
    })
})

 $("#ciudad_id").change(function(event){ //Muestra u oculta el formulario de registro de una organización según la opción elegida en el select ciudad.
    $id = event.target.value;
    if ($id > 0) {
        $("#vendedor-show").show()
        $("#display").show();
        //$('#vendedor_id').val("default").selectpicker('refresh')
        $("#rut").focus();
    }else{
        $("#vendedor-show").hide();
        //$('#ciudad').prop('disabled', false);
        //$('#vendedor_id').val("default").selectpicker('refresh')
        
    }
 })
 $("#vendedor_id").change(function(event){ //Muestra u oculta el formulario de registro de una organización según la opción elegida en el select ciudad.
    $id = event.target.value;
    if ($id > 0) {
        
        $('#contacto_id').val("default").selectpicker('refresh')
        $("#rut").focus();
    }else{
        $("#display").hide();
        $('#region_id').prop('disabled', false);
        $('#contacto_id').val("default").selectpicker('refresh')
    }
 })

$( "#update_role_user" ).click(function(event){ 
        var id= $( '#id' ).val()
        var route = "/update-roles/"+id+""
        var dataString  = $( '#form_update_roles_user' ).serializeArray()
        $.ajax({
            url: route,
            type: 'PUT',
            datatype: 'json',
            data:dataString,

            success:function(data){
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
                $('#personas').DataTable().ajax.reload();
                $('#roleModal').modal('toggle');
            },
            error:function(data){
                var error = data.responseJSON.errors;
                for(var i in error){
                    for(var j in error[i]){
                        var message = error[i][j];
                       $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000})
                    }
                }
            }
        })  
    })
$( "#update_especialidades" ).click(function(event){ 
        var id= $( '#id_especialidad' ).val()
        var route = "/especialidad-doctor/"+id+""
        var dataString  = $( '#form_especielidades_doctor' ).serializeArray()
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: route,
            type: 'PUT',
            datatype: 'json',
            data:dataString,
            success:function(data){
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
                $('#modal_especialidades').modal('toggle');
                 $('#table_doctores').DataTable().ajax.reload();
            },
            error:function(data){
                var error = data.responseJSON.errors;
                for(var i in error){
                    for(var j in error[i]){
                        var message = error[i][j];
                       $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000})
                    }
                }
            }
        })  
    })
$( "#update_permisos_roles" ).click(function(event){ 
        var id= $( '#id' ).val()
        var route = "/permisos-roles/"+id+""
        var dataString  = $( '#form_permisos_rol' ).serializeArray()
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: route,
            type: 'PUT',
            datatype: 'json',
            data:dataString,
            success:function(data){
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
                $('#modal_permisos').modal('toggle');
                 $('#table_roles').DataTable().ajax.reload();
            },
            error:function(data){
                var error = data.responseJSON.errors;
                for(var i in error){
                    for(var j in error[i]){
                        var message = error[i][j];
                       $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000})
                    }
                }
            }
        })  
    })

$( "#update_editar_rol" ).click(function(event){ //actualiza los datos del modal rol.
        var id = $("#id_e").val();
        var route = "/roles/"+id+""
        var dataString  = $( '#form_editar_rol' ).serializeArray()
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: route,
            type: 'PUT',
            datatype: 'json',
            data:dataString,
            success:function(data){
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
                $('#modal_editar_rol').modal('toggle');
                $('#table_roles').DataTable().ajax.reload();
            },
            error:function(data){
                var error = data.responseJSON.errors;
                for(var i in error){
                    for(var j in error[i]){
                        var message = error[i][j];
                       $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000})
                    }
                }
            }
        })
    })
$( "#update_editar_permiso" ).click(function(event){ //actualiza los datos del modal rol.
        var id = $("#id_e").val();
        var route = "/permisos/"+id+""
        var dataString  = $( '#form_editar_permiso' ).serializeArray()
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: route,
            type: 'PUT',
            datatype: 'json',
            data:dataString,
            success:function(data){
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
                $('#modal_editar_permiso').modal('toggle');
                $('#table_permisos').DataTable().ajax.reload();
            },
            error:function(data){
                var error = data.responseJSON.errors;
                for(var i in error){
                    for(var j in error[i]){
                        var message = error[i][j];
                       $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000})
                    }
                }
            }
        })
    })
$( "#update_editar_paciente" ).click(function(event){ 
        //event.preventDefault()
        var id= $( '#id_paciente' ).val()
        var route = "/pacientes/"+id+""
        var dataString  = $( '#form_editar_paciente' ).serializeArray()
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: route,
            type: 'PUT',
            datatype: 'json',
            data:dataString,
            success:function(data){
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
                $('#pacientes').DataTable().ajax.reload()
                $('#modal_editar_paciente').modal('toggle')
            },
            error:function(data){
                var error = data.responseJSON.errors;
                for(var i in error){
                    for(var j in error[i]){
                        var message = error[i][j];
                       $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000})
                    }
                }
            }
        })
    })
$( "#update_micuenta" ).click(function(event){  //actualiza los datos del doctor.
        var id= $( '#id_micuenta' ).val()
        var route = "mi-cuenta/"+id+""
        var dataString  = $( '#form_micuenta' ).serializeArray()
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: route,
            type: 'PUT',
            datatype: 'json',
            data:dataString,
            success:function(data){
                $('#modal_micuenta').modal('toggle')
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000}) 
            },
            error:function(data){
                var error = data.responseJSON.errors;
                for(var i in error){
                    for(var j in error[i]){
                        var message = error[i][j];
                       $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000})
                    }
                }
            }
        })
    })

	$( "#update_clave" ).click(function(event){ 

        var id= $( '#id_user_clave' ).val()

        var route = "/put-clave/"+id+""

		var dataString  = $( '#form_clave' ).serializeArray()

		$.ajax({

            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

			url: route,

			type: 'PUT',

			datatype: 'json',

			data:dataString,

			success:function(data){

                $('#table_doctores').DataTable().ajax.reload()

                $('#table_recepcionistas').DataTable().ajax.reload()

				 $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})

                 $('#modal_clave').modal('toggle')

                 $('#form_clave')[0].reset()

			},

             error:function(data){

              var error = data.responseJSON.errors;

                for(var i in error){

                    var message = error[i];

                    $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000});

                }

            }

		})

	})

    $( "#update_miclave" ).click(function(event){ 

        var id= $( '#mi_pass' ).val()

        var route = "/put-clave/"+id+""

        var dataString  = $( '#form_mi_clave' ).serializeArray()

        $.ajax({

            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

            url: route,

            type: 'PUT',

            datatype: 'json',

            data:dataString,

            success:function(data){

                 $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})

                 $('#modal_miclave').modal('toggle')

                 $('#form_mi_clave')[0].reset()

            },

             error:function(data){

              var error = data.responseJSON.errors;

                for(var i in error){

                    var message = error[i];

                    $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000});

                }

            }

        })

    })

$( "#add_rol" ).click(function(event){

        var route = "/roles/"

        var dataString  = $( '#form_add_rol' ).serializeArray()

        console.log(dataString)

        $.ajax({

            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

            url: route,

            type: 'POST',

            datatype: 'json',

            data:dataString,

            success:function(data){

                $('#table_roles').DataTable().ajax.reload()

                $('#modal_agregar_rol').modal('toggle')

                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})

            },

            error:function(data){

                var error = data.responseJSON.errors;

                for(var i in error){

                    for(var j in error[i]){

                        var message = error[i][j];

                       $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000})

                    }

                }

            }

        })

    })

$( "#add_permiso" ).click(function(event){

        var route = "/permisos/"

        var dataString  = $( '#form_add_permisos' ).serializeArray()

        $.ajax({

            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

            url: route,

            type: 'POST',

            datatype: 'json',

            data:dataString,

            success:function(data){

                $('#table_permisos').DataTable().ajax.reload()

                $('#modal_agregar_permiso').modal('toggle')

                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})

            },

            error:function(data){

                var error = data.responseJSON.errors;

                for(var i in error){

                    for(var j in error[i]){

                        var message = error[i][j];

                       $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000})

                    }

                }

            }

        })

    })




$( "#ingresar" ).click(function(event){ 

        event.preventDefault()

        var dataString  = $( '#form_login' ).serializeArray()

        var route = "login";

        $.ajax({

            url: route,

            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

            type: 'post',

            datatype: 'json',

            data:dataString,

            success:function(){

                redirect('/')

            },

            error:function(data){

              var error = data.responseJSON.errors;

                for(var i in error){

                    var message = error[i];

                    $.notify({icon: "add_alert", message: message},{type: 'danger', timer: 1000})

                }

            }

        })

    })

})
// Subir Imagen de para los usuarios desde la adminsitracion
    var $avatarInput, $avatarImage, $avatarForm;
    var avatarUrl;

    $(function(){
    
        $avatarInput = $('#avatarInput')
        $avatarImage = $('.avatarImage')
        $avatarForm = $('#avatarForm')
        avatarUrl = "/users/avatar"
        $id = $('#id_avatar').val();

        $avatarImage.on('click', function(){    
            $avatarInput.click()
        });
        
        $avatarInput.on('change', function(){

        var formData = new FormData();
        formData.append('avatar', $avatarInput[0].files[0])
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: avatarUrl+'?'+$avatarForm.serialize(),
                method: 'POST',
                data: formData,
                cache: true,
                processData: false,
                contentType: false,

            beforeSend: function(){
                    $avatarImage.attr('src', '/images/touchloader.gif')
            },
            success: function(data){
                alet('succ')
                    $avatarImage.attr('src', 'images/perfiles/'+data.file_name+'?'+ new Date().getTime())
                    $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
            },
            error: function(data){
                var error = data.responseJSON.errors;
                for(var i in error){
                    var message = error[i];
                      $avatarImage.attr('src');
                      $avatarImage.attr('src', 'images/perfiles/'+data.file_name+'?'+ new Date().getTime())
                     $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000})
                }
            }
        })

    })
})

// Subir Imagen de Perfil 
    var $txt_input, $avatar_img, $formAvatar;
    var Url;

    $(function(){
    
        $txt_input = $('#txt_input');
        $avatar_img = $('.avatar_img');
        $formAvatar = $('#formAvatar');
        Url = "/users/avatar";
        $id = $('#id_img').val();

        $avatar_img.on('click', function(){    
            $txt_input.click()
        });
        
        $txt_input.on('change', function(){

        var formData = new FormData();
        formData.append('avatar', $txt_input[0].files[0]);

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: Url+'?'+$formAvatar.serialize(),
                method: 'POST',
                data: formData,
                cache: true,
                processData: false,
                contentType: false,

            beforeSend: function(){
                    $avatar_img.attr('src', 'mages/touchloader.gif');
            },
            success: function(data){
                    $avatar_img.attr('src', 'images/perfiles/'+data.file_name+'?'+ new Date().getTime());
                   // $('#pacientes').DataTable().ajax.reload();
                    $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000});
            },
            error: function(data){
                var error = data.responseJSON.errors;
                for(var i in error){
                    var message = error[i];
                      $avatar_img.attr('src');
                      $avatar_img.attr('src', 'images/perfiles/'+data.file_name+'?'+ new Date().getTime());
                     $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000});
                }
            }
        })

    })
})
/*
    String.prototype.ucwords = function() {
    str = this.toLowerCase();
    return str.replace(/(^([a-zA-Z\p{M}]))|([ -][a-zA-Z\p{M}])/g,
        function($1){
            return $1.toUpperCase();
        });
}*/

function guardar_especialidad()
{
    var route = "/especialidades/"
    var dataString  = $( '#form_especialidades' ).serializeArray()
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: route,
        type: 'POST',
        datatype: 'json',
        data:dataString,
        success:function(data){
            $('#table_especialidades').DataTable().ajax.reload();
            $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
        },
        error:function(data){
            var error = data.responseJSON.errors;
            for(var i in error){
                for(var j in error[i]){
                    var message = error[i][j];
                   $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000})
                }
            }
        }
    })
}
function actualizar_especialidad($id)
{
    var id= $( '#id' ).val()
    var route = "/especialidades/"+id+"";
    var dataString  = $( '#form_especialidades' ).serializeArray()
    $.ajax({
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           url: route,
           type: 'PUT',
           data: dataString,
        success:function(data){
            $('#table_especialidades').DataTable().ajax.reload()
            $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
          },
       error:function(data){
            var error = data.responseJSON.errors;
                for(var i in error){
                    for(var j in error[i]){
                        var message = error[i][j];
                       $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000})
                    }
                }
          }
    });
}

function getDoctorUp(especialidad, id_doctor){
    $.get("get-doctor/"+especialidad+"",function(response,speciality){
    $("#doctor_id_e").empty()
    $('.selectpicker').selectpicker('refresh')
    if (response == "") {
         $("#doctor_id_e").html("<option>--Seleccione--</option>")
         $('.selectpicker').selectpicker('refresh')
    }else{
        for(i = 0; i <response.length; i++) {
            $("#doctor_id_e").append("<option value='"+response[i].id+"'>"+response[i].apellidos+" "+response[i].nombres+"</option>")
        }
        $('#doctor_id_e').val(id_doctor)
        $('.selectpicker').selectpicker('refresh')
    }
})
}

//recibe la ciudad segun la region.
function getCiudadUp(region_id, ciudad_id){
    $.get("get-ciudad/"+region_id+"",function(response,region){
    $("#ciudad_id").empty()
    $('.selectpicker').selectpicker('refresh')
    if (response == "") {
         $("#ciudad_id").html("<option>--Seleccione--</option>")
         $('.selectpicker').selectpicker('refresh')
    }else{
        for(i = 0; i <response.length; i++) {
            $("#ciudad_id").append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>")
        }
        $('#ciudad_id').val(ciudad_id)
        $('.selectpicker').selectpicker('refresh')
    }
})
}

function roles_user(id)// carga datos en el modal roles_user del módulo de personas.
{
  // event.preventDefault();
   var route = "/personas/"+id+"/edit";
   var csrf_token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
           url: route,
           type: 'GET',
        success:function(data){
            $('#id').val(data.id)
            $('#rut').val(data.rut)
            $('#nombres').val(data.nombres)
            $('.title-name').html(data.nombres +' '+ data.apellidos)
            $('#image-modal').html('<img src="images/perfiles/'+data.avatar+'" alt="Thumbnail Image" class="img-rounded img-responsive">')
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
       error:function(jqXHR, textStatus, errorThrown){
           if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
          }
    });
}

//----------------------------------------------------------------------------------------
// inicia crud organización
function organizacion_user(id, tipo)// carga datos en el modal organizacion_user del módulo de organizacion, si el tipo es 2 es porque el llamado es editar, si es 1 es agregar.

{

    $("#modal_organizacion").modal('show')

    $('.contacto_2').html("")

    if (tipo == 1) {

        $("#boton_organizacion").html("<a href='#' onclick='organizacion(0,1)' class='btn btn-primary pull-right'>Agregar</a>")

        $("#display").hide()

        $("#ciudad_id").html("<option>--Seleccione--</option>")

        document.getElementById("form_organizacion").reset()

        $('.selectpicker').selectpicker('refresh')

    }else{

        $("#boton_organizacion").html("<a href='#' onclick='organizacion("+id+",2)' class='btn btn-primary pull-right'>Actualizar</a>")

        $("#vendedor-show").show()

        $("#ciudad-show").show();

        $("#display").show() //muestra los campos del formuario organizaciones

        var route = "/organizaciones/"+id+"/edit"

        var csrf_token = $('meta[name="csrf-token"]').attr('content')

            $.ajax({

               url: route,

               type: 'GET',

            success:function(data){

                $("#region_id").val(data.region_id)

                var ciudad_id = $("#ciudad_id").val()

                getCiudadUp(data.region_id, data.ciudad_id)

                $('#id').val(data.id)

                $('#rut').val(data.rut).attr("disabled", true)

                $('#nombre').val(data.nombre)

                $('#email').val(data.email)

                $('#giro').val(data.giro)

                $('#direccion').val(data.direccion)

                $('#telefono').val(data.telefono)

                $('#vendedor_id').val(data.vendedor_id)

                $("INPUT[name=tipo]").val([data.tipo]) //carga valor de radiobutton desde mysql

                const crearOption = (value, name, selected) => `<option value="${value}"${selected.includes(value) ? ' selected' : ''}>${name}</option>`

                const obj = data.contactos

                const values = Object.keys(obj)

                const opciones = values.map(x => crearOption(x, obj[x], data.my_contactos))

                const select = document.getElementById('contacto_id')

                     select.innerHTML = ''

                     opciones.forEach(x => { select.insertAdjacentHTML('beforeend', x) })

                const valor = data.my_contactos

                     i = 0, size = valor.length

                          for(i; i < size; i++){

                        $('select option[value='+valor[i]+']').attr('selected', 'selected')

                    }

               $('.selectpicker').selectpicker('refresh')

              },

           error:function(){

          alert("La operación falló")

          }

        });

    }

}
function organizacion(id,tipo){

    var dataString  = $( '#form_organizacion' ).serializeArray()

    if (tipo == 1) {

    var route = "organizaciones";

    $.ajax({

        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

        url: route,

        type: 'POST',

        datatype: 'json',

        data:dataString,

        success:function(data){

                // se debe agregar el li en el propecto

                 $('ul[prospecto]').append(

                    '<li id="'+data.id+'" name="'+data.nombre+'" class="list-group-item list-group-item-action">'+

                        '<span class="badge">'+

                            '<a href="#">'+

                                '<i class="material-icons text-success" style="font-size: 17px;">check_circle</i>'+

                            '</a>'+

                            '<a href="#" onclick="on_off(\'' + "" + '\', '+data.id+', '+data.estado_actual+', \'' + data.nombre + '\')">'+
                                
                                '<i class="material-icons text-danger" style="font-size: 17px;">close</i>'+

                            '</a>'+

                        '</span>'+

                        '<a href="#"><p class="text-muted">'+data.nombre+'</p></a>'+

                    '<li>')

                $('#organizaciones').DataTable().ajax.reload()

                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})

                $('#form_organizacion')[0].reset()

                $('#modal_organizacion').modal('toggle')    

        },

        error:function(data){

            var error = data.responseJSON.errors;

            for(var i in error){

                for(var j in error[i]){

                    var message = error[i][j];

                   $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000})

                }

            }

        }

    })

    }else{

        var route = "/organizaciones/"+id+""

        $.ajax({

            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

            url: route,

            type: 'PUT',

            datatype: 'json',

            data:dataString,

            success:function(data){

                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})

                $('#organizaciones').DataTable().ajax.reload()

                $('#modal_organizacion').modal('toggle')

            },

            error:function(data){

                var error = data.responseJSON.errors;

                for(var i in error){

                    for(var j in error[i]){

                        var message = error[i][j];

                       $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000})

                    }

                }

            }

        }) 

    }

}
function ficha(id, origen) //carga datos en la ficha.

{
    var csrf_token = $('meta[name="csrf-token"]').attr('content')

    switch(origen) {

        case 1:

            $("#modal_ficha_contacto").modal("show")

            var html = ""

            $.ajax({

                url: "/ficha_contacto/"+id+"",

                type: "GET",

                success:function(data){

                    $(".img_pac").attr('src', 'images/perfiles/'+data.avatar+'?'+ new Date().getTime()).addClass("img-circle")

                    $('#rut').html(data.rut)

                    $('#nombres').html(data.nombres)

                    $('#email').html("<a href='mailto:"+data.email+"'><span class='label label-primary'>"+data.email+"</span></a>")

                    $('#telefono').html(data.telefono)

                    $('#genero').html(data.genero)

                    $('#direccion').html(data.direccion)

                    $('#cargo').html("<span class='label label-primary'>"+data.cargo+"</span>")

                    $('#empresas_2').html("")

                    for (i=0;i<data.empresas.length;i++) {

                        $("#empresas_2").html( $("#empresas_2").html() + "<h6><a href='#' onclick='javascript:alert("+data.empresas[i].id+")'><span class='label label-primary'>" + data.empresas[i].nombre.toUpperCase() + "</span></a></h6>")

                    }

                    $('.title-name').html("<span class='label label-rose'>"+data.nombres+"</span>")

                    $('#cerrar').html('<a href="#" class="btn btn-danger pull-right" data-dismiss="modal">Cerrar</a>')

                  },

                error:function(){

                   alert("La operación falló")

                  }

            })

        break;

        case 2:

            $("#modal_ficha_organizacion").modal("show")

            var route = "/ficha_organizacion/"+id+""

            var csrf_token = $('meta[name="csrf-token"]').attr('content')

            var tipo =""

            var html = ""

            var image = new Image()

            $.ajax({

                   url: route,

                   type: 'GET',

                success:function(data){

                   if (data.tipo == "PEQUENA") {data.tipo = "PEQUEÑA"}

                    $(".img_pac").attr('src', 'images/perfiles/'+data.logo+'?'+ new Date().getTime()).addClass("img-circle");

                    $('.rut').html(data.rut)

                    $('.nombre').html(data.nombre)

                    $('.email').html("<a href='mailto:"+data.email+"'><span class='label label-primary'>"+data.email+"</span></a>")

                    $('.telefono').html(data.telefono)

                    $('.direccion').html(data.direccion)

                    $('.tipo').html(data.tipo)

                    $('#estado').html("<a href='#' onclick='historial_estados("+data.id+")' <span class='label' style='background:"+data.color+"'>"+data.nombre_estado+" ("+data.notas_estado+")"+"</span></a>" + " " +"<a href='#'><span class='btn btn-success btn-simple editar_estado'><i class='material-icons'>edit</i></span></a>")

                    $("#id_empresa").val(data.id)

                    $('.actualizacion').html(data.actualizacion)

                    $('#contacto_2').html(html)

                    for(var i in data.contacto){

                        for(var j in data.contacto[i]){

                            $("#contacto_2").html( $("#contacto_2").html() + "<h6><a href='#' onclick='javascript:alert("+data.contacto[i][j][0]+")'><span class='label label-primary'>" + data.contacto[i][j][1] + " " + data.contacto[i][j][2] + "</span></a></h6>")

                        }
                    }

                    $('.title-name').html(data.nombre)

                    $('#descargar').html('<a href="pdf/'+data.id+'" id="download_ficha" class="btn btn-primary pull-right"><span class="btn-label"><i class="material-icons">file_download</i></span>Descargar</a>')

                    
                  },

               error:function(){

                   alert("La operación falló")

                  }

            })

            break;

        case 3:

            $("#modal_ficha_vendedor").modal("show")

            $.ajax({

                url: "/ficha_vendedor/"+id+"",

                type: "GET",

                success:function(data){

                    $(".img_pac").attr('src', 'images/perfiles/'+data.avatar+'?'+ new Date().getTime()).addClass("img-circle")

                    $('#rut').html(data.rut)

                    $('#nombres').html(data.nombres)

                    $('#email').html("<a href='mailto:"+data.email+"'><span class='label label-primary'>"+data.email+"</span></a>")

                    $('#telefono').html(data.telefono)

                    $('#genero').html(data.genero)

                    $('#direccion').html(data.direccion)

                    $('#empresas_2').html("")

                   for (i=0;i<data.empresas.length;i++) {

                        $("#empresas_2").html( $("#empresas_2").html() + "<h6><a href='#' onclick='javascript:alert("+data.empresas[i].id+")'><span class='label label-primary'>" + data.empresas[i].nombre.toUpperCase() + "</span></a></h6>")

                    }

                    $('.title-name').html("<span class='label label-rose'>"+data.nombres+"</span>")

                    $('#cerrar').html('<a href="#" class="btn btn-danger pull-right" data-dismiss="modal">Cerrar</a>')

                  },

                error:function(){

                   alert("La operación falló")

                  }

            })

            break;
    
    }

}

function historial_estados(id) //carga datos del historial de los estados con el id de la organización.

{

   $("#modal_historial_estado").modal("show")

    var html = "";

    var route = "/historial_estado/"+id+"";

    var csrf_token = $('meta[name="csrf-token"]').attr('content')

    $.ajax({

        url: route,

        type: 'GET',

        success:function(data){    

            html += cargar_tabla_historial(data.agrupar, data.color, data.estado, data.organizacion_id, data.estado_actual)

            $('#modal_historial_estado .modal-body').empty()

            $('#modal_historial_estado .modal-body').append(html)

        },

        error:function(data){

            alert("la operación falló")

            }
            
    })

}

function cargar_tabla_historial(datos, color, estado, organizacion, estado_actual){

    var html = "";

    var title = "";

    title += "<h6>ESTADO ACTUAL: <span class='label' style='background:"+color+"'>"+estado+"</span></h6>";

    html+="<table class='table table-hover table-striped table-responsive tabe-condensed'>";

    html+="<thead><td class='tamano_celda_th'>FECHA</td><td>ESTADO</td><td>NOTA</td><td class='text-center'><a href='#' onclick='mostrar_agregar_nota("+estado_actual+", "+organizacion+",\"" + estado + "\", \"" + color + "\", "+0+")' data-toggle='tooltip' data-placement='top' class='btn btn-primary btn-round btn-fab btn-fab-mini' title='Agregar Nota'><i class='material-icons'>add_comment</i></a></td></thead>";

    html+="<tbody>";

    for(var i in datos){

        for(var j in datos[i]){

            html+="<tr><td><b class='text-primary'>"+datos[i][j][2]+"</b></td><td><span class='label' style='background:"+datos[i][j][3]+"'>"+datos[i][j][1]+"</span></td><td>"+datos[i][j][6]+"<br><p class='pull-right small'>"+datos[i][j][8]+"</p></td><td class='text-center'><a href='#' onclick='mostrar_agregar_nota("+estado_actual+", "+organizacion+",\"" + estado + "\", \"" + color + "\", "+datos[i][j][0]+")'><span class='btn btn-success btn-simple'><i class='material-icons'>edit</i></span></a><a href='#' onclick='eliminar("+datos[i][j][0]+", \"" +'nota de '+datos[i][j][1]+ "\", \"" +'estado_organizacion/'+ "\", "+datos[i][j][7]+" )'><span class='btn btn-danger btn-simple'><i class='material-icons'>delete</i></span></a></td></tr>";

        }

    }

    html+="</tbody>";

    html+="</table>";

    $("#colapse").html(html)

    $("#title-estado").html(title)

    return html;

}

function mostrar_agregar_nota(estado_id, organizacion_id, estado, color, id){

    var title = "";

    $("#nota").val("")

    $("#boton-agregar-nota").html("<a class='btn btn-primary btn-sm btn pull-right' onclick='agregar_nota(0,1)'>Agregar Nota</a>")

    title += "<h6>AGREGAR NOTA AL ESTADO: <span class='label' style='background:"+color+"'>"+estado+"</span></h6>";

    $("#modal_estado").modal("show")

    $("#add_nota").html(title)

    $("#id_estado").val(estado_id)

    $("#id_empresa").val(organizacion_id)

    if (id>0) {

        $("#boton-agregar-nota").html("<a class='btn btn-primary btn-sm btn pull-right' onclick='agregar_nota("+id+",2)'>Actualizar Nota</a>")

        var route = "/estado_organizacion/"+id+"";

         $.ajax({

           url: route,

           type: 'GET',

           success:function(data){

            $("#id").val(data.id)

            $("#nota").val(data.nota)

           }

        })

    }

}


function agregar_nota(id, tipo){
    var dataString  = $( '#form_nota' ).serializeArray()
    var route = "estado_organizacion";
    var type = "";
    var datatype = 'json';
    if (tipo == 1) {
        type = 'POST';
        route = route;
        boton = 'Agregar Nota';
    }else{
        type = 'PUT';
        route = route+"/"+id+"";
        boton = 'Actualizar Nota';
    }
      $.ajax({
            url: route,
            type: type,
            datatype: datatype,
            data:dataString,
             beforeSend: function(){
                $("#boton-agregar-nota").html("<a class='btn btn-primary btn-sm btn pull-right'>"+boton+" <i class='fa fa-2px fa-spinner'></i></a>");
            },
            success:function(data){
                var html = "";
                $("#modal_estado").modal("hide");
                html += cargar_tabla_historial(data.historial_estados, data.color, data.estado, data.organizacion_id, data.estado_actual)
                $('#modal_historial_estado .modal-body').empty();
                $('#modal_historial_estado .modal-body').append(html);
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})             
            },
            error:function(data){
                var error = data.responseJSON.errors;
                for(var i in error){
                    for(var j in error[i]){
                        var message = error[i][j];
                       $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000})
                    }
                }
            }
        })
}

function mostrar_cambiar_estado(organizacion_id, nombre){
    $("#titulo_estado").html("<span>Cambiar Estado: </span> <span class='label label-rose'>"+nombre+"</span></h6>")
    $("#modal_cambiar_estado").modal("show")
    $(".nota").val("")
    var route = "/cargar_estados_segun_actual/"+organizacion_id+"";
    var html = "";
    $.ajax({
        url: route,
        type: 'GET',
        success:function(data){   
            $("#select-estados").empty();
            for (i=0;i<data.estados.length;i++) {
                $("#select-estados").append("<option style='background:"+data.estados[i].color+"; color:white' value='"+data.estados[i].id+"'>"+data.estados[i].estado+"</option>")
            }
            $("#boton-cambiar-estado").html("<a onclick='cambiar_estado("+organizacion_id+")' class='btn btn-primary btn pull-right'>Cambiar Estado</a>");
            
        }
    })
}

function cambiar_estado(organizacion_id){
    const swalWithBootstrapButtons = swal.mixin({
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false,
    })

swalWithBootstrapButtons({
    title: '¿Estás seguro que quieres cambiar el estado de esta empresa?',
    text: "Si aceptas, NO PODRÁS VOLVER AL ESTADO ACTUAL.!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Si, Cambiar!',
    cancelButtonText: 'No, cancelar!',
    reverseButtons: true
    }).then((result) => {
      if (result.value) {
        var dataString  = $( '#form_cambiar_estado' ).serializeArray()
        var csrf_token = $('meta[name="csrf-token"]').attr('content')
        var route = "/cambiar_estado/"+organizacion_id+"";
        $.ajax({
            headers: csrf_token,
            url: route,
            datatype: "json",
            type: 'POST',
            data: dataString,
            beforeSend: function(){
                $("#boton-cambiar-estado").html("<a class='btn btn-primary btn pull-right'>Cambiar Estado <i class='fa fa-2px fa-spinner'></i></a>");
                },
           success:function(data){
              $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
              $("#modal_cambiar_estado").modal("hide");
              $(".nota").html("");
              $('#organizaciones').DataTable().ajax.reload();
            }
        })
      } 
    })
}
async function on_off(elemento,organizacion_id, estado_id, nombre){

if($(elemento).siblings('input').prop("checked") || elemento == ""){

    const swalWithBootstrapButtons = swal.mixin({

      confirmButtonClass: 'btn btn-success',

      cancelButtonClass: 'btn btn-danger',

      buttonsStyling: false,

    })

    const {value: nota} = await swal({

      title: 'Desactivar a '+nombre+'',

      input: 'textarea',

      type: 'question',

      confirmButtonClass: 'btn btn-success',

      cancelButtonClass: 'btn btn-danger',

      confirmButtonText: 'Desactivar',

      cancelButtonText: 'Cancelar',

      buttonsStyling: false,

      inputPlaceholder: 'Escriba aquí una nota con el motivo de la baja...',

      showCancelButton: true,

      inputValidator: (value) => {

        return !value && 'Debe completar todos los campos!'

      }

    })
        var checked = $(elemento).siblings('input').prop("checked")

        if (nota) {

            var csrf_token = $('meta[name="csrf-token"]').attr('content')

            $.ajax({

            url:  "/cambiar_estado/"+organizacion_id+"",

            type: 'POST',

            datatype: "json",

            data: {'_token' : csrf_token, 'estado_actual': estado_id , 'estado_id': 7, 'nota': nota, 'organizacion_id': organizacion_id},

            success:function(data){

                $('#organizaciones').DataTable().ajax.reload()

                //Se elimina el ul del elemento seleccionado para suprimir.

                $("li[id='"+organizacion_id+"']").remove()

                //$("#count-prospectos").append(data.cantidad)

                $.notify({icon: "add_alert", message: "la Empresa "+nombre+" ha sido desactivada exitosamente!"},{type: 'success', timer: 1000});

            }, 
            error:function(){

                $(elemento).siblings('input').prop('checked', !checked);

                alert('la operación falló');

            }

       })

        } else {

              $(elemento).siblings('input').prop('checked', !checked);

        }

   }else{

    const {value: nota} = await swal({

      title: 'Activar a '+nombre+'',

      text: 'Cuando se activa una empresa, se añade automáticamente al estado PROSPECTO',

      input: 'textarea',

      type: 'question',

      confirmButtonClass: 'btn btn-success',

      cancelButtonClass: 'btn btn-danger',

      confirmButtonText: 'Activar',

      cancelButtonText: 'Cancelar',

      buttonsStyling: false,

      inputPlaceholder: 'Escriba aquí una nota para el nuevo estado...',

      showCancelButton: true,

      inputValidator: (value) => {

        return !value && 'Debe completar todos los campos!'

      }

    })

    var checked = $(elemento).siblings('input').prop("checked")

        if (nota) {

            var csrf_token = $('meta[name="csrf-token"]').attr('content')

            $.ajax({

            url:  "/cambiar_estado/"+organizacion_id+"",

            type: 'POST',

            datatype: "json",

            data: {'_token' : csrf_token, 'estado_id': 1, 'nota': nota},

            success:function(data){

                $('#organizaciones').DataTable().ajax.reload();

                $.notify({icon: "add_alert", message: "la Empresa "+nombre+" ha sido activada exitosamente!"},{type: 'success', timer: 1000});

            }, 

            error:function(){

                $(elemento).siblings('input').prop('checked', !checked);

                alert('la operación falló');

            }

       })

        } else {

              $(elemento).siblings('input').prop('checked', !checked);

        }

    }

}
//finaliza crud organización.
//------------------------------

//Inicia crud cargo
function mostrar_cargo(id, tipo){

    $("#modal_cargo").modal('show')

    $("#boton_cargo").html("<a href='#' onclick='cargo(0,1)' class='btn btn-primary pull-right'>Agregar</a>")
}

function cargo(id, tipo)//Inserta un cargo en el select cargo_id del modal agregar contacto.

{

   //event.preventDefault();  

   var dataString  = $( '#form_cargo' ).serializeArray()

    if (tipo == 1) {

    var route = "cargos"

     $.ajax({

        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

        url: route,

        type: 'POST',

        datatype: 'json',

        data:dataString,

        success:function(data){

           $("#cargo_id").empty() //Limpia el select "cargo_id"del modal "agregar contacto"

           for (i=0;i<data.cargos.length;i++) { //llena el select del modal "agregar contacto" con el cargo nuego agregado recientemente.

            $("#cargo_id").append("<option value='"+data.cargos[i].id+"'>"+data.cargos[i].nombre+"</option>")

            $('#cargo_id option[value='+data.my_cargo+']').attr('selected', 'selected')// Selecciona el cargo insertado recientemente

           }

           $('.selectpicker').selectpicker('refresh')

           $("#modal_agregar_cargo").modal('hide')

           $('#form_cargo')[0].reset()

           $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})

        },

        error:function(data){

            var error = data.responseJSON.errors;

            for(var i in error){

                for(var j in error[i]){

                    var message = error[i][j];

                   $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000})

                }

            }

        }

    })

    }else{

        //codigo para editar

    }

}
//Finaliza crud cargo

//----------------------
 
//Inicia crud contacto
function mostrar_contacto(id,tipo_user){

   $("#modal_contacto").modal('show')

   var route = ""

   var html = ""

   if (id == 0) {

    //Si el id es igual a cero, significa que el modal es llamado desde el boton agregar contacto - vendedor

        $('#form_contacto')[0].reset()

        $( "#rut_user" ).prop( "readonly", false )

        $( "#email_user" ).prop( "readonly", false )

        if (tipo_user == 1) {

            //muestra el formulario de vendedor.

            route = "vendedores/"+id+"/edit",

            $("#tipo_user").val("vendedor")

            $(".title-contacto").html("Agregar Vendedor")

            $("#show-cargo").hide()

            $("#boton_contacto").html("<a href='#' onclick='insertarTipoPersona(0,2)' class='btn btn-primary pull-right'>Agregar Vendedor</a>")

            $("#show-empresas").show()

        }else{

            //muestra el formulario de agregar contacto de la empresa.

            route = "contactos/"+id+"/edit",

            $("#tipo_user").val("contacto")

            $("#rut_user").parent().remove()

            $("#direccion_user").parent().remove()

            $("#email_user").parent().remove()

            $("#nombres_user").parent().parent().removeClass("col-md-6")

            $("#nombres_user").parent().parent().addClass("col-md-12")

            $("#telefono_user").parent().parent().removeClass("col-md-6")

            $("#telefono_user").parent().parent().addClass("col-md-12")

            $("#apellidos_user").parent().parent().removeClass("col-md-6")

            $("#apellidos_user").parent().parent().addClass("col-md-12")

            $(".title-contacto").html("Agregar Contacto")

            $("#show-cargo").show()

            $("#show-empresas").show()

            $("#boton_contacto").html("<a href='#' onclick='insertarTipoPersona(0,1)' class='btn btn-primary pull-right'>Agregar Contacto</a>")

        } 

    }else{ 

        // si el id viene con un valor, significa que el modal es llamado desde un botón editar contacto - vendedor

        $( "#rut_user" ).prop( "readonly", true )

        $( "#email_user" ).prop( "readonly", true )

        if(tipo_user == 1){

            route = "vendedores/"+id+"/edit",

            $(".title-contacto").html("Actualizar Vendedor")

            $("#show-cargo").hide()

            $("#show-empresas").show()

            $("#boton_contacto").html("<a href='#' onclick='insertarTipoPersona("+id+",2)' class='btn btn-primary pull-right'>Actualizar Vendedor</a>")

        }else{

            route = "contactos/"+id+"/edit",

            $(".title-contacto").html("Actualizar Contacto")

            $("#rut_user").parent().remove()

            $("#direccion_user").parent().remove()

            $("#email_user").parent().remove()

            $("#nombres_user").parent().parent().removeClass("col-md-6")

            $("#nombres_user").parent().parent().addClass("col-md-12")

            $("#telefono_user").parent().parent().removeClass("col-md-6")

            $("#telefono_user").parent().parent().addClass("col-md-12")

            $("#apellidos_user").parent().parent().removeClass("col-md-6")

            $("#apellidos_user").parent().parent().addClass("col-md-12")

            $("#show-cargo").show()

            $("#show-empresas").show()

            //carga las empresas que tiene asociadas el contacto seleccionado

            $("#boton_contacto").html("<a href='#' onclick='insertarTipoPersona("+id+",1)' class='btn btn-primary pull-right'>Actualizar Contacto</a>")

        }
        
        $.ajax({

            url: route,

            type: "GET",

            success:function(data){

                $("#rut_user").val(data.rut)

                $("#nombres_user").val(data.nombres)

                $("#apellidos_user").val(data.apellidos)

                $("#email_user").val(data.email)

                $("#direccion_user").val(data.direccion)

                $("#telefono_user").val(data.telefono)

                $("#cargo_id").val(data.cargo)

                $("INPUT[name=genero]").val([data.genero]) //carga valor de radiobutton desde mysql

                $('#cargo_id option[value='+data.cargo+']').attr('selected', 'selected')  

                 const crearOption = (value, name, selected) => `<option value="${value}"${selected.includes(value) ? ' selected' : ''}>${name}</option>`

                const obj = data.organizaciones

                const values = Object.keys(obj)

                const opciones = values.map(x => crearOption(x, obj[x], data.my_organizaciones))

                const select = document.getElementById('organizacion_id')

                     select.innerHTML = ''

                     opciones.forEach(x => { select.insertAdjacentHTML('beforeend', x) })

                const valor = data.my_organizaciones

                    i = 0, size = valor.length

                        for(i; i < size; i++){

                            $('select option[value='+valor[i]+']').attr('selected', 'selected')

                        }

                        $('.selectpicker').selectpicker('refresh')

            },

            error:function(data){

                var error = data.responseJSON.errors;

                for(var i in error){

                    for(var j in error[i]){

                        var message = error[i][j];

                       $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000})

                    }

                }

            }

        }) 

    }

}

function insertarTipoPersona(id,tipo){

    var dataString  = $( '#form_contacto' ).serializeArray()

    var dataType = "JSON"

    var type = ""

    var headers = {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')};

    if (tipo == 1) { 

        //inserta o actualiza a una persona de tipo contacto en la base de datos.

            var route = "contactos"

        }else{ 

        // inserta o actualiza una persona de tipo vendedor en la base de datos.

            var route = "vendedores"

        }

    if (id > 0) {

        type = "PUT"

        var route = route+"/"+id+""

        console.log(dataString)

            $.ajax({

            headers: headers,

            url: route,

            type: type,

            datatype: dataType,

            data:dataString,

            success:function(data){

                $('.selectpicker').selectpicker('update')

                $("#modal_contacto").modal('hide')

                $('#form_contacto')[0].reset()

                $('#contactos').DataTable().ajax.reload()

                $('#vendedores').DataTable().ajax.reload()

                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})

            },

            error:function(data){

                var error = data.responseJSON.errors;

                for(var i in error){

                    for(var j in error[i]){

                        var message = error[i][j];

                       $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000})

                    }

                }

            }

        })  

    }else{

        type = "POST"

         console.log(dataString)

        $.ajax({

        headers: headers,

        url: route,

        type: type,

        datatype: dataType,

        data:dataString,

            success:function(data){

               $("#"+data.id).empty() //Limpia el select "cargo_id"del modal "agregar contacto"

                for (i=0;i<data.personas.length;i++) { //llena el select del modal "agregar contacto" con el cargo nuego agregado recientemente.

                    $("#"+data.id).append("<option value='"+data.personas[i].id+"'>"+data.personas[i].nombres+" "+data.personas[i].apellidos+"</option>")

                    $('#'+data.id+' option[value='+data.my_persona+']').attr('selected', 'selected')// Selecciona el cargo insertado recientemente

                }

                $('.selectpicker').selectpicker('refresh')

                $("#modal_contacto").modal('hide')

                $('#form_contacto')[0].reset()

                $('#contactos').DataTable().ajax.reload()

                $('#vendedores').DataTable().ajax.reload()

                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})

            },

            error:function(data){

                var error = data.responseJSON.errors;

                for(var i in error){

                    for(var j in error[i]){

                        var message = error[i][j];

                       $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000})

                    }

                }

            }

        })  

    }

}

//Finaliza crud contacto

function carga_usuario(id)//carga datos del doctor y recepcionista en el modal editar.

{
   //event.preventDefault(); este evento no funciona con firefox y envia error, no cargan los datos en el modal.

   var route = "/recepcionistas/"+id+"/edit"

   var csrf_token = $('meta[name="csrf-token"]').attr('content')

    $.ajax({

           url: route,

           type: 'GET',

        success:function(data){

            $("INPUT[name=nombres]").val([data.nombres])

            $("INPUT[name=apellidos]").val([data.apellidos])

            $("INPUT[name=email]").val([data.email])

            $("INPUT[name=telefono]").val([data.telefono])

            $("INPUT[name=direccion]").val([data.direccion])

            $("INPUT[name=nacimiento]").val([data.nacimiento])

            $("INPUT[name=id]").val(data.id)

            $(".avatarImage").attr('src', 'images/perfiles/'+data.avatar+'?'+ new Date().getTime())

            $("INPUT[name=genero]").val([data.genero]) //carga valor de radiobutton desde mysql

            $('.title-name').html(data.nombres+" "+ data.apellidos)

          },

       error:function(){

           alert('la operación falló');

          }

    })

}

function carga_rol(id)//carga datos del doctor en el modal editar.
{
   var route = "/roles/"+id+"/edit";
   var csrf_token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
           url: route,
           type: 'GET',
        success:function(data){
            $('#name_e').val(data.nombre)
            $('#id_e').val(data.id)
            $('.title-name').html(data.nombre)
          },
       error:function(){
           alert('la operación falló');
          }
    });
}
function carga_permiso(id)//carga datos de los permisos en el modal editar.
{
   var route = "/permisos/"+id+"/edit";
   var csrf_token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
           url: route,
           type: 'GET',
        success:function(data){
            $('#name_e').val(data.nombre)
            $('#id_e').val(data.id)
            $('.title-name').html(data.nombre)
          },
       error:function(){
           alert('la operación falló');
          }
    });
}

function permisos_roles(id) //carga modal que contiene el select multiple de permisos del rol.
{
   var route = "/permisos-roles/"+id+"/edit";
   var csrf_token = $('meta[name="csrf-token"]').attr('content');
   var image = new Image();
    $.ajax({
           url: route,
           type: 'GET',
        success:function(data){
            $('#id').val(data.id)
            $('#rol').html(data.nombre)
            $('.title-name').html(data.nombre)
            const crearOption = (value, name, selected) => `<option value="${value}"${selected.includes(value) ? ' selected' : ''}>${name}</option>`
            const obj = data.permisos
            const values = Object.keys(obj)
            const opciones = values.map(x => crearOption(x, obj[x], data.my_permisos))
            const select = document.getElementById('permisos_roles')
                 select.innerHTML = ''
                 opciones.forEach(x => { select.insertAdjacentHTML('beforeend', x) })
            const valor = data.my_permisos
                 i = 0, size = valor.length
                      for(i; i < size; i++){
                    $('select option[value='+valor[i]+']').attr('selected', 'selected')
                }
           $('.selectpicker').selectpicker('refresh')
          },
       error:function(){
           alert('la operación falló');
          }
    });
}

function eliminar(id, nombre, ruta, organizacion_id) //funcion general para eliminar cualquier registro de la base de datos.

{

const swalWithBootstrapButtons = swal.mixin({

  confirmButtonClass: 'btn btn-success',

  cancelButtonClass: 'btn btn-danger',

  buttonsStyling: false,

})

swalWithBootstrapButtons({

  title: 'Estás seguro de Eliminar a '+nombre+ '?',

  text: "No podrás revertir esto.!",

  type: 'question',

  showCancelButton: true,

  confirmButtonText: 'Si, Eliminar!',

  cancelButtonText: 'No, cancelar!',

  reverseButtons: true

}).then((result) => {

        if (result.value) {

        var csrf_token = $('meta[name="csrf-token"]').attr('content')

        var route = ruta+id;

        $.ajax({

            url: route,

            type: 'POST',

            data: {'_method' : 'DELETE', '_token' : csrf_token, 'organizacion_id': organizacion_id},

                success:function(data){

                    var html = "";

                    html += cargar_tabla_historial(data.historial_estados, data.color, data.estado, data.organizacion_id, data.estado_actual)

                    $('#modal_historial_estado .modal-body').empty();

                    $('#modal_historial_estado .modal-body').append(html);

                    $('#organizaciones').DataTable().ajax.reload();

                    $('#categorias').DataTable().ajax.reload();

                    $('#contactos').DataTable().ajax.reload();

                    $('#vendedores').DataTable().ajax.reload();

                    $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000});

                },          

                error:function(){

                    alert('la operación falló');

                }

           })

        } 

    })

}

function delete_rol(id)
{
    $('#eliminar').html('<button type="button" class="btn btn-simple" data-dismiss="modal">Cancelar</button><a href="#" onclick="del_rol('+id+')"; type="button" class="btn btn-success btn-simple">Sí, Borrar</a>')
}
function del_rol(id)
{// elimina un paciente
    var route = "/roles/"+id+"";
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
     $.ajax({
            url: route,
            type: 'POST',
            data: {'_method' : 'DELETE', '_token' : csrf_token},
            success:function(data){
                $("#eliminar_rol").modal("hide");
                $('#table_roles').DataTable().ajax.reload();
                $.notify({icon: "add_alert", message: data.message},{type: data.type, timer: 1000});
            }, 
            error:function(data){
                alert('la operación falló');
            }
       });
}

function cargar_datos_especialidad(id)// Carga los datos en el formulario que esta al lado de la lista de especialidades.
{
    var route = "/especialidades/"+id+"/edit";
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
           url: route,
           type: 'GET',
        success:function(data){
            $('#id').val(data.id)
            $('#nombre').val(data.nombre)
            $('#btn-guardar').html('<a href="#" onclick="actualizar_especialidad();" class="btn btn-fill btn-success">Actualizar</a>')
          },
       error:function(){
           alert('la operación falló');
          }
    });
}

 function getClave(id)
{  
    var route = "/getClave/"+id+"";
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
       url: route,
       type: 'GET',
        success:function(data){
            $("#id_user_clave").val(data.id)
            $(".title-name").html(data.nombres)
        }, 
        error:function(){
            alert('la operación falló')
        }
    })
}


