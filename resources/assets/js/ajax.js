function redirect(ruta)
{
    window.location = ruta;
    //setTimeout("location."+ruta, 5000);
}
$(document).ready(function() {
    var valor, contador, parrafo;  
// Mostramos un mensaje inicial y lo añadimos al div de id contador.  
$('<p class="indicador">Tienes 500 caracteres restantes</p>').appendTo('#contador');
// Definimos el evento para que detecte cada vez que se presione una tecla.  
$('#nota').keydown(function(){  
// Redefinimos el valor de contador al máximo permitido (150).  
contador = 500;  
/* Quitamos el párrafo con clase advertencia o indicador, en caso de que ya se 
   haya mostrado un mensaje */  
$('.advertencia').remove();  
$('.indicador').remove();  
// Tomamos el valor actual del contenido del área de texto  
valor = $('#nota').val().length;  
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
$('#contador').append(parrafo + 'Tienes ' + contador + ' caracteres restantes</p>');  
  
});  

$('#modal_estado').on('shown.bs.modal', function () {
    $('#nota').focus();
})


$('[data-toggle="tooltip"]').tooltip();
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

    /*$("#fonasa").click(function(event){
        var html = "";
        html+="<select id='prevision_select' data-style='select-with-transition'>";
        html+="<option>FONASA A</option>";
        html+="<option>FONASA B</option>";
        html+="<option>FONASA C</option>";
        html+= "</select>";
        $("#prevision").html(html)
        $("#prevision_select").selectpicker()
    })

    $("#particular").click(function(event){
        var html = "";
        html+="<select id='prevision_select' data-style='select-with-transition' disabled='true'>";
        html+="<option>PARTICULAR</option>";
        html+= "</select>";
        $("#prevision").html(html)
        $("#prevision_select").selectpicker()
    })
 $("#isapre").click(function(event){
        var html = "";
        html+="<select id='prevision_select' data-style='select-with-transition'";
        html+="<option>CONASALUD</option>";
        html+="<option>CRUZ BLANCA</option>";
        html+="<option>PARTICULAR</option>";
        html+="<option>BANMÉDICA</option>";
        html+= "</select>";
        $("#prevision").html(html)
        $("#prevision_select").selectpicker()
    })*/

 $("#region_id").change(function(event){ //carga las Ciudades en el select #ciudad_id según la región elegida.
    alert()
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
        $("#vendedor-show").show();
        $('#vendedor_id').val("default").selectpicker('refresh')
        $("#rut").focus();
    }else{
        $("#vendedor-show").hide();
        //$('#ciudad').prop('disabled', false);
        $('#vendedor_id').val("default").selectpicker('refresh')
        
    }
 })
 $("#vendedor_id").change(function(event){ //Muestra u oculta el formulario de registro de una organización según la opción elegida en el select ciudad.
    $id = event.target.value;
    if ($id > 0) {
        $("#display").show();
        $('#contacto_id').val("default").selectpicker('refresh')
        $("#rut").focus();
    }else{
        $("#display").hide();
        $('#region_id').prop('disabled', false);
        $('#contacto_id').val("default").selectpicker('refresh')
    }
 })

      
/*$( "#delete_cita" ).click(function(event){ //esta funcion elimina una cita oendiente desde el cale ndario.
    var id= $( '#id' ).val()
    var popup = confirm("¿ Esta seguro de eliminar esta cita ?")
    var route = "/citas/"+id+"";
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    if(popup ==true){
     $.ajax({
            url: route,
            type: 'POST',
            data: {'_method' : 'DELETE', '_token' : csrf_token},
            success:function(data){
                    $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
                    document.getElementById("form_cita").reset();
                    $("#citas_medicas").fullCalendar('refetchEvents')
                    $('#reserva').html(data.reserva)
                    $("#up_evento").modal("hide")
                    //$("#form_cita").trigger( "reset" );
            }, 
            error:function(){
                alert('la operación falló');
            }
       })
    }
})

$( "#guardar_cita" ).click(function(event){
       // event.preventDefault();
        var dataString  = $( '#form_cita' ).serializeArray();
        var route = "/citas";
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: route,
            type: 'post',
            datatype: 'json',
            data:dataString,
            success:function(data){
                console.log(data.mensaje)
                if (data.success == false) {
                    $.notify({icon: "add_alert", message: data.message},{type: 'warning', timer: 1000})
                }else{
                    $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
                    $('#form_cita')[0].reset()
                    $("#citas_medicas").fullCalendar('refetchEvents')
                    $('#reserva').html(data.reserva)
                    $("#add_evento #doctor_id").html("<option>--Seleccione--</option>")
                    $("#add_evento #doctor_id").empty()
                    $("#add_evento").modal("hide")
                    $('.selectpicker').selectpicker('refresh')
                }
            },
            error:function(data){
                var error = data.responseJSON.errors;
                for(var i in error){
                    for(var j in error[i]){
                        var message = error[i][j];
                        $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000});
                    }
                }
            }
        })
    })*/

/*$( "#btn_guardar_doc" ).click(function(event){ 
        event.preventDefault();
        var dataString  = $( '#form_doc' ).serializeArray();
        var route = "/doctores";
        $.ajax({
            url: route,
            type: 'post',
            datatype: 'json',
            data:dataString,
            success:function(data){
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000});
                $('#form_doc')[0].reset();
            },
            error:function(data){
                var error = data.responseJSON.errors;
                for(var i in error){
                    for(var j in error[i]){
                        var message = error[i][j];
                       $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000});
                    }
                }
            }
        })
    })
$( "#btn_guardar_rec" ).click(function(event){ 
        event.preventDefault();
        var dataString  = $( '#form_rec' ).serializeArray();
        var route = "/recepcionistas";

        $.ajax({
            url: route,
            type: 'post',
            datatype: 'json',
            data:dataString,

            success:function(data){
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000});
                $('#form_doc')[0].reset();
            },
            error:function(data){
                var error = data.responseJSON.errors;
                for(var i in error){
                    for(var j in error[i]){
                        var message = error[i][j];
                       $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000});
                    }
                }
            }
        })
    })

$( "#update_cita" ).click(function(event){ 
        event.preventDefault()
        var id= $( '#id' ).val()
        var route = "/citas/"+id+""
        var dataString  = $( '#form_update_cita' ).serializeArray()
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: route,
            type: 'PUT',
            datatype: 'json',
            data:dataString,

            success:function(data){
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
                $("#citas_medicas").fullCalendar('refetchEvents')
                $("#up_evento").modal("hide");
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
$( "#update_consulta_pendiente" ).click(function(event){ //esta funcion actualiza una cita Pendiente desde el modulo de consultas medicas.
        event.preventDefault()
        var id= $( '#id_consulta_pendiente' ).val()
        var route = "/citas/"+id+""
        var dataString  = $( '#form_update_consulta_pendiente' ).serializeArray()
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: route,
            type: 'PUT',
            datatype: 'json',
            data:dataString,
            success:function(data){
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
                $("#citas_medicas").fullCalendar('refetchEvents')
                $('#pendientes').DataTable().ajax.reload()
                $("#update_cita_pendiente").modal("hide");
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
$( "#update_consulta" ).click(function(event){ 
    
       var id= $( '#id' ).val()
        var route = "/consultas/"+id+""
        var dataString  = $( '#form_consulta' ).serializeArray()
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: route,
            type: 'PUT',
            datatype: 'json',
            data:dataString,
            success:function(data){
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
                document.getElementById("form_consulta").reset()
                $('#pendientes').DataTable().ajax.reload()
                $('#table_atendidos').DataTable().ajax.reload()
                $("#citas_medicas").fullCalendar('refetchEvents')
                $("#modal_atender").modal("hide")
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
    */
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
$( "#actualizar_usuario" ).click(function(event){  //actualiza los datos del doctor.
        var id= $( '#id' ).val()
        var tipo = $("#tipo").val()
        var route = ""
        if (tipo === "doctor") {route = "/doctores/"+id+"";}else{route = "/recepcionistas/"+id+"";}
        var dataString  = $( '#form_editar_usuario' ).serializeArray()
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: route,
            type: 'PUT',
            datatype: 'json',
            data:dataString,
            success:function(data){
                if (data.tipo === "doctor") {
                    $('#table_doctores').DataTable().ajax.reload()
                    $('#modal_editar_doctor').modal('toggle')
                    $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
                }else{
                    $('#table_recepcionistas').DataTable().ajax.reload()
                    $('#modal_editar_recepcionista').modal('toggle')
                    $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
                }         
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
		//event.preventDefault()
        var id= $( '#id_user_clave' ).val()
        var route = "/put-clave/"+id+""
		var dataString  = $( '#form_clave' ).serializeArray();
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
       // event.preventDefault()
        var id= $( '#mi_pass' ).val()
        var route = "/put-clave/"+id+""
        var dataString  = $( '#form_mi_clave' ).serializeArray();
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
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: route,
            type: 'POST',
            datatype: 'json',
            data:dataString,
            success:function(data){
                $('#table_roles').DataTable().ajax.reload();
                $('#modal_agregar_rol').modal('toggle');
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
                $('#table_permisos').DataTable().ajax.reload();
                $('#modal_agregar_permiso').modal('toggle');
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



$( "#add_paciente" ).click(function(event){
        var route = "/pacientes/"
        var dataString  = $( '#form_add_paciente' ).serializeArray()
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: route,
            type: 'POST',
            datatype: 'json',
            data:dataString,
            success:function(data){
                $('#pacientes').DataTable().ajax.reload();
                $('#modal_agregar_paciente').modal('toggle');
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
/*$( "#add_usuario" ).click(function(event){  //esta funcion agrega nuevos doctores y recepcionistas.
        var route = ""
        var dataString  = $( '#form_add_usuario' ).serializeArray()
        var tipo = $(".tipo").val()
        if (tipo === "doctor"){route = "/doctores/"}else{route = "/recepcionistas/"}
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: route,
            type: 'POST',
            datatype: 'json',
            data:dataString,
            success:function(data){
                if (data.tipo === "doctor") {
                     $('#table_doctores').DataTable().ajax.reload();
                     $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
                     $('#form_add_usuario')[0].reset()
                     $('#modal_agregar_doctor').modal('toggle')
                }else{
                     $('#table_recepcionistas').DataTable().ajax.reload();
                     $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
                     $('#form_add_usuario')[0].reset()
                     $('#modal_agregar_recepcionista').modal('toggle')
                }
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
    })*/


$( "#ingresar" ).click(function(event){ 
        //event.preventDefault();
        var dataString  = $( '#form_login' ).serializeArray();
        var route = "login";
        $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'post',
            datatype: 'json',
            data:dataString,
            success:function(){
                redirect('/');
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
                    $avatarImage.attr('src', '/assets/img/touchloader.gif')
            },
            success: function(data){
                alet('succ')
                    $avatarImage.attr('src', '/assets/img/perfiles/'+data.file_name+'?'+ new Date().getTime())
                    $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
            },
            error: function(data){
                var error = data.responseJSON.errors;
                for(var i in error){
                    var message = error[i];
                      $avatarImage.attr('src');
                      $avatarImage.attr('src', '/assets/img/perfiles/'+data.file_name+'?'+ new Date().getTime())
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
                    $avatar_img.attr('src', '/assets/img/touchloader.gif');
            },
            success: function(data){
                    $avatar_img.attr('src', '/assets/img/perfiles/'+data.file_name+'?'+ new Date().getTime());
                   // $('#pacientes').DataTable().ajax.reload();
                    $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000});
            },
            error: function(data){
                var error = data.responseJSON.errors;
                for(var i in error){
                    var message = error[i];
                      $avatar_img.attr('src');
                      $avatar_img.attr('src', '/assets/img/perfiles/'+data.file_name+'?'+ new Date().getTime());
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
function organizacion_user(id, tipo)// carga datos en el modal organizacion_user del módulo de organizacion, si el tipo es 2 es porque el llamado es editar sio es 1 es agregar.
{
    $("#modal_organizacion").modal('show')
    $('.contacto_2').html("")
    //event.preventDefault();
    if (tipo == 1) {
        $("#boton_organizacion").html("<a href='#' onclick='organizacion(0,1)' class='btn btn-primary pull-right'>Agregar</a>")
        $("#display").hide();
        $("#ciudad_id").html("<option>--Seleccione--</option>")
        document.getElementById("form_organizacion").reset();
        $('.selectpicker').selectpicker('refresh')
    }else{
        $("#boton_organizacion").html("<a href='#' onclick='organizacion("+id+",2)' class='btn btn-primary pull-right'>Actualizar</a>")
        $("#vendedor-show").show();
        $("#ciudad-show").show();
        $("#display").show(); //muestra los campos del formuario organizaciones
        var route = "/organizaciones/"+id+"/edit";
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
               url: route,
               type: 'GET',
            success:function(data){
                console.log(data.region_id)
                $("#region_id").val(data.region_id)
                var ciudad_id = $("#ciudad_id").val()
                getCiudadUp(data.region_id, data.ciudad_id)
                $('#id').val(data.id)
                $('#rut').val(data.rut)
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
    console.log(dataString)
    if (tipo == 1) {
    var route = "organizaciones";
   // alert(route)
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: route,
        type: 'POST',
        datatype: 'json',
        data:dataString,
        success:function(data){
            console.log(data)
                 $('#organizaciones').DataTable().ajax.reload();
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
                $('#organizaciones').DataTable().ajax.reload();
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
function ficha(id) //carga datos en la ficha.
{
   $("#ficha_modal").modal("show")
   var route = "/ficha/"+id+"";
   var csrf_token = $('meta[name="csrf-token"]').attr('content');
   var tipo ="";
   var html = "";
   var image = new Image();
    $.ajax({
           url: route,
           type: 'GET',
        success:function(data){
            if (data.tipo == "PEQUENA") {data.tipo = "PEQUEÑA"}
            $(".img_pac").attr('src', 'assets/img/perfiles/'+data.logo+'?'+ new Date().getTime()).addClass("img-circle");
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
            for (i=0;i<data.contacto.length;i++) {
                $("#contacto_2").html( $("#contacto_2").html() + "<h6><a href='#' onclick='javascript:alert("+data.contacto[i].id+")'><span class='label label-primary'>" + data.contacto[i].nombres.toUpperCase() + " " + data.contacto[i].apellidos.toUpperCase() + "</span></a></h6>")
            }
            $('.title-name').html(data.nombre)
            $('#descargar').html('<a href="pdf/'+data.id+'" id="download_ficha" class="btn btn-primary pull-right"><span class="btn-label"><i class="material-icons">file_download</i></span>Descargar</a>')
            
          },
       error:function(){
            //redirect('/')
           $.notify({icon: "add_alert", message: "Su sesión ha finalizado, porfavor vuelta a logearse"},{type: 'danger', timer: 1000})
          }
    })
}

function historial_estados(id) //carga datos del historial de los estados con el id de la organización.
{
   $("#modal_historial_estado").modal("show");
    var html = "";
    var route = "/historial_estado/"+id+"";
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: route,
        type: 'GET',
        success:function(data){    
            html += cargar_tabla_historial(data.agrupar, data.color, data.estado, data.organizacion_id, data.estado_actual)
            $('#modal_historial_estado .modal-body').empty();
            $('#modal_historial_estado .modal-body').append(html);
        },
        error:function(data){
            alert("la operación falló");
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
            html+="<tr><td><b class='text-primary'>"+datos[i][j][2]+"</b></td><td><span class='label' style='background:"+datos[i][j][3]+"'>"+datos[i][j][1]+"</span></td><td>"+datos[i][j][6]+"</td><td class='text-center'><a href='#' onclick='mostrar_agregar_nota("+estado_actual+", "+organizacion+",\"" + estado + "\", \"" + color + "\", "+datos[i][j][0]+")'><span class='btn btn-success btn-simple'><i class='material-icons'>edit</i></span></a><a href='#' onclick='eliminar("+datos[i][j][0]+", \"" +'nota de '+datos[i][j][1]+ "\", \"" +'estado_organizacion/'+ "\", "+datos[i][j][7]+" )'><span class='btn btn-danger btn-simple'><i class='material-icons'>delete</i></span></a></td></tr>";
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
    $("#boton-agregar-nota").html("<a class='btn btn-primary btn-sm btn pull-right' onclick='agregar_nota(0,1)'>Agregar Nota</a>");
    title += "<h6>AGREGAR NOTA AL ESTADO: <span class='label' style='background:"+color+"'>"+estado+"</span></h6>";
    $("#modal_estado").modal("show");
    $("#add_nota").html(title);
    $("#id_estado").val(estado_id)
    $("#id_empresa").val(organizacion_id)
    if (id>0) {
        $("#boton-agregar-nota").html("<a class='btn btn-primary btn-sm btn pull-right' onclick='agregar_nota("+id+",2)'>Actualizar Nota</a>");
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
    }else{
        type = 'PUT';
        route = route+"/"+id+"";
    }
      $.ajax({
            url: route,
            type: type,
            datatype: datatype,
            data:dataString,
            success:function(data){
                var html = "";
                $("#modal_estado").modal("hide");
                html += cargar_tabla_historial(data.historial_estados, data.color, data.estado, data.organizacion_id, data.estado_actual)
                $('#modal_historial_estado .modal-body').empty();
                $('#modal_historial_estado .modal-body').append(html);
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})             
            },
            error:function(data){
                console.log(data)
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
    $("#titulo_estado").html("<span>Cambiar Estado: </span> <span class='label label-rose'>"+nombre+"</span></h6>");
    $("#modal_cambiar_estado").modal("show");
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

if($(elemento).siblings('input').prop("checked")){

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
            data: {'_token' : csrf_token, 'estado_id': 7, 'nota': nota},
            success:function(data){
                var html = "";
                $('#organizaciones').DataTable().ajax.reload();
               /* html += cargar_tabla_historial(data.historial_estados, data.color, data.estado, data.organizacion_id, data.estado_actual)
                $('#modal_historial_estado .modal-body').empty();
                $('#modal_historial_estado .modal-body').append(html);*/
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
                console.log(data)
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
    $("#modal_agregar_cargo").modal('show')
    $("#boton_cargo").html("<a href='#' onclick='cargo(0,1)' class='btn btn-info pull-right'>Agregar</a>")
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

function mostrar_contacto(id,tipo_user){ //estamos aqui
    $("#modal_contacto").modal('show')
    if (tipo_user == 1) {
        //muestrea el formulario de vendedor.
        $("#tipo_user").val("vendedor")
        $(".title-contacto").html("Agregar Vendedor")
        $("#show-cargo").hide()
        $("#boton_contacto").html("<a href='#' onclick='contacto(0,1)' class='btn btn-info pull-right'>Agregar Vendedor</a>")
    }else{
        //muestra el formulario de contacto de la empresa.
        $("#tipo_user").val("contacto")
        $(".title-contacto").html("Agregar Contacto")
        $("#show-cargo").show()
        $("#boton_contacto").html("<a href='#' onclick='contacto(0,1)' class='btn btn-info pull-right'>Agregar Contacto</a>")
    }    
}

function contacto(id,tipo){
    //si origen es 1 -> agrega un vendedor de la empresa.
    //si origen es 2 -> agrega un contacto de la empresa cliente.
    var dataString  = $( '#form_contacto' ).serializeArray()
    if (tipo == 1) {
    var route = "contactos" 
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: route,
        type: 'POST',
        datatype: 'json',
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
        var route = "/organizaciones/"+id+""
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: route,
            type: 'PUT',
            datatype: 'json',
            data:dataString,
            success:function(data){
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
                $('#organizaciones').DataTable().ajax.reload();
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





//Finaliza crud contacto

function carga_usuario(id)//carga datos del doctor y recepcionista en el modal editar.
{
   //event.preventDefault(); este evento no funciona con firefox y envia error, no cargan los datos en el modal.
   var route = "/recepcionistas/"+id+"/edit";
   var csrf_token = $('meta[name="csrf-token"]').attr('content');
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
            $(".avatarImage").attr('src', 'assets/img/perfiles/'+data.avatar+'?'+ new Date().getTime())
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

function carga_paciente(id)//carga datos del paciente en el modal editar.
{
   //event.preventDefault(); este evento no funciona con firefox y envia error, no cargan los datos en el modal.
   var route = "/pacientes/"+id+"/edit";
    $.ajax({
           url: route,
           type: 'GET',
        success:function(data){
            $("#id_paciente").val(data.id)
            $(".avatarImage").attr('src', 'assets/img/perfiles/'+data.avatar+'?'+ new Date().getTime())
            $('#rut_e').val(data.rut)
            $('#nombres_e').val(data.nombres)
            $('#apellidos_e').val(data.apellidos)
            $('#email_e').val(data.email)
            $('#telefono_e').val(data.telefono)
            $('#direccion_e').val(data.direccion)
            $('#nacimiento_e').val(data.nacimiento)
            $("INPUT[name=genero_e]").val([data.genero]) //carga valor de radiobutton desde mysql
            $('#sangre_e').val(data.sangre)
            $('#vih_e').val(data.vih)
            $('#peso_e').val(data.peso)
            $('#altura_e').val(data.altura)
            $('#alergia_e').val(data.alergia)
            $('#medicamento_e').val(data.medicamento)
            $('#enfermedad_e').val(data.enfermedad)
            $('.title-name_e').html(data.nombres)
          },
       error:function(){
           alert('la operación falló')
          }
    })
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
function especialidad_doctor(id) //carga modal que contiene el select multiple de las especialidades del doctor.
{
   var route = "/especialidad-doctor/"+id+"/edit";
   var csrf_token = $('meta[name="csrf-token"]').attr('content');
   var image = new Image();
    $.ajax({
       url: route,
       type: 'GET',
        success:function(data){
            $('#id_especialidad').val(data.id)
            $(".img_doc").attr('src', 'assets/img/perfiles/'+data.avatar+'?'+ new Date().getTime());
            //$(".avatarImage").attr('src', 'assets/img/perfiles/'+data.avatar+'?'+ new Date().getTime());
            $('#rut').html(data.rut)
            $('#nombres').html(data.nombres)
            $('#estudios_complementarios').val(data.estudios_complementarios)
            $('.title-name').html(data.nombres)
            const crearOption = (value, name, selected) => `<option value="${value}"${selected.includes(value) ? ' selected' : ''}>${name}</option>`
            const obj = data.especialidades
            const values = Object.keys(obj)
            const opciones = values.map(x => crearOption(x, obj[x], data.my_especialidades))
            const select = document.getElementById('especialidades_doctor')
                 select.innerHTML = ''
                 opciones.forEach(x => { select.insertAdjacentHTML('beforeend', x) })
            const valor = data.my_especialidades
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
  title: 'Estás seguro de eliminar a '+nombre+ '?',
  text: "No podrás revertir esto.!",
  type: 'warning',
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
                console.log(data)
                var html = "";
                //$("#modal_estado").modal("hide");
                html += cargar_tabla_historial(data.historial_estados, data.color, data.estado, data.organizacion_id, data.estado_actual)
                $('#modal_historial_estado .modal-body').empty();
                $('#modal_historial_estado .modal-body').append(html);
                $('#organizaciones').DataTable().ajax.reload();
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000});
            }, 
            error:function(){
                alert('la operación falló');
            }
       });


  } 
})
}

function delete_especialidad(id)
{
    $('#eliminar').html('<button type="button" class="btn btn-simple" data-dismiss="modal">Cancelar</button><a href="#" onclick="del_especialidad('+id+')"; type="button" class="btn btn-success btn-simple">Sí, Borrar</a>')
}
function del_especialidad(id)
{// elimina un paciente
    var route = "/especialidades/"+id+"";
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
     $.ajax({
            url: route,
            type: 'POST',
            data: {'_method' : 'DELETE', '_token' : csrf_token},
            success:function(data){
                $("#eliminar_especialidad").modal("hide");
                $('#table_especialidades').DataTable().ajax.reload();
                $.notify({icon: "add_alert", message: data.message},{type: data.type, timer: 1000});
            }, 
            error:function(data){
                alert('la operación falló');
            }
       });
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
function delete_permiso(id)
{
    $('#eliminar').html('<button type="button" class="btn btn-simple" data-dismiss="modal">Cancelar</button><a href="#" onclick="del_permiso('+id+')"; type="button" class="btn btn-success btn-simple">Sí, Borrar</a>')
}
function del_permiso(id)
{// elimina un paciente
    var route = "/permisos/"+id+"";
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
     $.ajax({
            url: route,
            type: 'POST',
            data: {'_method' : 'DELETE', '_token' : csrf_token},
            success:function(data){
                $("#eliminar_permiso").modal("hide");
                $('#table_permisos').DataTable().ajax.reload();
                $.notify({icon: "add_alert", message: data.message},{type: data.type, timer: 1000});
            }, 
            error:function(data){
                alert('la operación falló');
            }
       });
}
function delete_doctor(id)
{
    $('#eliminar').html('<button type="button" class="btn btn-simple" data-dismiss="modal">Cancelar</button><a href="#" onclick="del_doctor('+id+')"; type="button" class="btn btn-success btn-simple">Sí, Borrar</a>')
}
function del_doctor(id)
{// elimina un paciente
    var route = "/doctores/"+id+"";
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
     $.ajax({
            url: route,
            type: 'POST',
            data: {'_method' : 'DELETE', '_token' : csrf_token},
            success:function(data){
                $("#eliminar_doctor").modal("hide");
                $('#table_doctores').DataTable().ajax.reload();
                $.notify({icon: "add_alert", message: data.message},{type: data.type, timer: 1000});
            }, 
            error:function(data){
                alert('la operación falló');
            }
       })
}
function delete_recepcionista(id)
{
    $('#eliminar').html('<button type="button" class="btn btn-simple" data-dismiss="modal">Cancelar</button><a href="#" onclick="del_recepcionista('+id+')"; type="button" class="btn btn-success btn-simple">Sí, Borrar</a>')
}
function del_recepcionista(id)
{// elimina un paciente
    var route = "/recepcionistas/"+id+"";
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
     $.ajax({
            url: route,
            type: 'POST',
            data: {'_method' : 'DELETE', '_token' : csrf_token},
            success:function(data){
                $("#eliminar_recepcionista").modal("hide");
                $('#table_recepcionistas').DataTable().ajax.reload();
                $.notify({icon: "add_alert", message: data.message},{type: "success", timer: 1000});
            }, 
            error:function(data){
                alert('la operación falló');
            }
       })
}
function atender(id)
{ //Carga mestra el modal para realizar una atención.
    var route = "/consultas/"+id+"/edit";
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
           url: route,
           type: 'GET',
        success:function(data){
            $('#edad').html(data.edad)
            $('#visitas').html(data.visitas)
            $('#paciente').html(data.paciente)
            $('#sintomas').val(data.sintomas)
            $('#examenes').val(data.examenes)
            $('#tratamiento').val(data.tratamiento)
            $('#observacion').val(data.observacion)
            $('#id').val(data.id)
          },
       error:function(){
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
function cargar_consulta_atendida(id)// Carga los datos en el modal para editar, en una consulta atendida.
{
    var route = "/consultas/"+id+"/edit";
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
           url: route,
           type: 'GET',
        success:function(data){
            $('#edad_atendida').html(data.edad)
            $('#visitas_atendida').html(data.visitas)
            $('#paciente_atendida').html(data.paciente)
            $('#sintomas_atendida').val(data.sintomas)
            $('#examenes_atendida').val(data.examenes)
            $('#tratamiento_atendida').val(data.tratamiento)
            $('#observacion_atendida').val(data.observacion)
            $('#id').val(data.id)
          },
       error:function(){
           alert('la operación falló');
          }
    })
}
    function update_cita_pendiente(id)
    {
        var route = "/citas/"+id+"/edit";
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
               url: route,
               type: 'GET',
            success:function(data){
                $("#id_consulta_pendiente").val(data.id)
                $("#fecha_inicio_e").val(data.fecha_inicio)
                $("#hora_inicio_e").val(data.hora_inicio)
                $('#hora_fin_e').val(data.hora_fin)
                $('#paciente_id_e').val(data.paciente)
                $('#speciality_id_e').val(data.especialidad)
                $('#descripcion_e').val(data.descripcion)
                var doctor_id = $("#doctor_id_e_up").val()
                getDoctorUp(data.especialidad, data.doctor)
                select_especialidad_up(doctor_id, data.especialidad)

              },
           error:function(){
               alert('la operación falló');
              }
        });
}
 function ver_cita(id)
    {
        var route = "/citas/"+id+"/edit";
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
               url: route,
               type: 'GET',
            success:function(data){
                $("#id_consulta_pendiente").val(data.id)
                $("#fecha_inicio_ver").val(data.fecha_inicio)
                $("#hora_inicio_ver").val(data.hora_inicio)
                $('#hora_fin_ver').val(data.hora_fin)
                $('#paciente_id_ver').val(data.paciente)
                $('#speciality_id_ver').val(data.especialidad)
                //$('#doctor_id').val(data.doctor)
                $('#descripcion_ver').val(data.descripcion)
                $.get("get-doctor/"+data.especialidad+"",function(response,speciality){
                    $("#doctor_id_ver").empty();
                    if (response == "") {
                         $("#doctor_id_ver").html("<option>--Seleccione--</option>")
                    }else{
                        for(i = 0; i <response.length; i++) {
                            $("#doctor_id_ver").append("<option value='"+response[i].id+"'>"+response[i].apellidos+" "+response[i].nombres+"</option>")
                        }
                        $('#doctor_id_ver').val(data.doctor)
                    }
                })
                
                //$('#doctor_id').val(data.doctor)
              },
           error:function(){
               alert('la operación falló');
              }
        });
}
 function delete_cita_pendiente(id)
{  //esta funcion elimina una cita oendiente desde el modulo de consultas medicas.
    var popup = confirm("¿ Esta seguro de eliminar esta cita ?")
    var route = "/citas/"+id+"";
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    if(popup ==true){
     $.ajax({
            url: route,
            type: 'POST',
            data: {'_method' : 'DELETE', '_token' : csrf_token},
            success:function(data){
                    $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
                    $("#citas_medicas").fullCalendar('refetchEvents')
                    $('#pendientes').DataTable().ajax.reload()
                    $('#table_atendidos').DataTable().ajax.reload()
            }, 
            error:function(){
                alert('la operación falló');
            }
       })
    }
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


