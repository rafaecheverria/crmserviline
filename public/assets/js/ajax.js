function redirect(ruta)
{
    window.location = ruta;
    //setTimeout("location."+ruta, 5000);
}
$(document).ready(function() {

$('#dias').datepicker({
    multidate:true,
});

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

    $("#fonasa").click(function(event){
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
    })
     
$("#speciality_id_e").change(function(event){ //carga los doctores en el select #doctor_id según la especialidad elegida.
    var id = event.target.value;
    if (!id) 
        $("#doctor_id_e").html("<option>--Seleccione--</option>")
        $('.selectpicker').selectpicker('refresh') //refresca el select para que cambie su valor
        $.get("get-doctor/"+id+"",function(response,speciality){
        $("#doctor_id_e").empty()
        $('.selectpicker').selectpicker('refresh') //refresca el select para que cambie su valor
        if (response == "") {
             $("#doctor_id_e").html("<option>--Seleccione--</option>")
              $('.selectpicker').selectpicker('refresh') //refresca el select para que cambie su valor
        }else{
            for(i = 0; i <response.length; i++) {
                $("#doctor_id_e").append("<option value='"+response[i].id+"'>"+response[i].apellidos+" "+response[i].nombres+"</option>")
            }
            $('.selectpicker').selectpicker('refresh') //refresca el select para que cambie su valor
        }
    })
})


$("#speciality_id").change(function(event){ //carga los doctores en el select #doctor_id según la especialidad elegida.
    var id = event.target.value;
    if (!id) 
        $("#doctor_id").html("<option>--Seleccione--</option>")
        $('.selectpicker').selectpicker('refresh') //refresca el select para que cambie su valor
        $.get("get-doctor/"+id+"",function(response,speciality){
        $('.selectpicker').selectpicker('refresh') //refresca el select para que cambie su valor
        $("#doctor_id").empty()
        if (response == "") {
             $("#doctor_id").html("<option>--Seleccione--</option>")
              $('.selectpicker').selectpicker('refresh') //refresca el select para que cambie su valor
        }else{
            for(i = 0; i <response.length; i++) {
                $("#doctor_id").append("<option value='"+response[i].id+"'>"+response[i].apellidos+" "+response[i].nombres+"</option>")
            }
            $('.selectpicker').selectpicker('refresh') //refresca el select para que cambie su valor
        }
        })
})

$( "#delete_cita" ).click(function(event){ //esta funcion elimina una cita oendiente desde el cale ndario.
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
    })
$( "#btn_guardar_doc" ).click(function(event){ 
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
        event.preventDefault()
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
		event.preventDefault()
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
        event.preventDefault()
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
$( "#add_usuario" ).click(function(event){  //esta funcion agrega nuevos doctores y recepcionistas.
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
    })

$( "#ingresar" ).click(function(event){ 
        event.preventDefault();
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

    String.prototype.ucwords = function() {
    str = this.toLowerCase();
    return str.replace(/(^([a-zA-Z\p{M}]))|([ -][a-zA-Z\p{M}])/g,
        function($1){
            return $1.toUpperCase();
        });
}

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

function getDoctorAdd(especialidad){
    $.get("get-doctor/"+especialidad+"",function(response,speciality){
        $("#up_evento #doctor_id").empty()
        if (response == "") {
             $("#up_evento #doctor_id").html("<option>--Seleccione--</option>")
        }else{
            for(i = 0; i <response.length; i++) {
                $("#up_evento #doctor_id").append("<option value='"+response[i].id+"'>"+response[i].apellidos+" "+response[i].nombres+"</option>")
            }
            $('#up_evento #doctor_id').val(event.doctor_id)
            $('.selectpicker').selectpicker('refresh')
        }
    })
}
// si falla el select especialidades en el update cita en sesion doctor, es porque no tiene permisos "leer especialidades"
function select_especialidad_up(doctor_id, speciality_id){ //lista las especialidades del doctor en sesion 
        $.get("get-especialidad/"+doctor_id+"",function(response,speciality){
        $("#speciality_id_e").empty()
        $('.selectpicker').selectpicker('refresh')
        if (response == "") {
             $("#speciality_id_e").html("<option>--Seleccione--</option>")
             $('.selectpicker').selectpicker('refresh')
        }else{
            for(i = 0; i <response.length; i++) {
                $("#speciality_id_e").append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>")
                $('.selectpicker').selectpicker('refresh')
            }
            $('#speciality_id_e').val(speciality_id)
            $('.selectpicker').selectpicker('refresh')
        }
    })
}

function select_especialidad_add(id, speciality_id){
    if (id == "0") {
    }else{
        $.get("get-especialidad/"+id+"",function(response,speciality){
        $("#speciality_id_add").empty()
        $('.selectpicker').selectpicker('refresh')
        if (response == "") {
             $("#speciality_id_add").html("<option>--Seleccione--</option>")
             $('.selectpicker').selectpicker('refresh')
        }else{
            for(i = 0; i <response.length; i++) {
                $("#speciality_id_add").append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>")
                $('.selectpicker').selectpicker('refresh')
            }
            //$('#up_evento #speciality_id_e_add').val(speciality_id)
            $('.selectpicker').selectpicker('refresh')

        }
        })
    }
}
function roles_user(id)// carga datos en el modal roles_user del módulo de personas.
{
   event.preventDefault();
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
       error:function(){
           alert('la operación falló');
          }
    });
}

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
            //$('.selectpicker3').selectpicker()
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

function ficha_paciente(id) //carga datos en la ficha del paciente.
{
   var route = "/ficha/"+id+"";
   var csrf_token = $('meta[name="csrf-token"]').attr('content');
   var image = new Image();
    $.ajax({
           url: route,
           type: 'GET',
        success:function(data){
            $(".img_pac").attr('src', 'assets/img/perfiles/'+data.avatar+'?'+ new Date().getTime());
            $('#rut').html(data.rut)
            $('#nombres').html(data.nombres)
            $('#edad').html(data.edad)
            $('#email').html(data.email)
            $('#telefono').html(data.telefono)
            $('#genero').html(data.genero)
            $('#direccion').html(data.direccion)
            $('#sangre2').html(data.sangre)
            $('#vih2').html(data.vih)
            $('#peso2').html(data.peso)
            $('#altura2').html(data.altura)
            $('#alergia2').html(data.alergia)
            $('#medicamento2').html(data.medicamento)
            $('#enfermedad2').html(data.enfermedad)
            $('.title-name').html(data.nombres)
            $('#descargar').html('<a href="pdf/'+data.id+'" id="download_ficha" class="btn btn-info pull-right"><span class="btn-label"><i class="material-icons">file_download</i></span>Descargar</a>')
          },
       error:function(){
           alert('la operación falló');
          }
    });
}

function expediente_paciente(id) //carga datos en el expediente del paciente.
{
   var route = "/expediente/"+id+"";
   var csrf_token = $('meta[name="csrf-token"]').attr('content');
   var html = "";
    $.ajax({
        url: route,
        type: 'GET',
        success:function(data){
           if (data.array.length > 0) {
                for(i=0;i<data.array.length;i++){
                    for(i=0;i<data.fecha.length;i++){
                        html+="<div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true'>";
                        html+="<div class='panel panel-default'>";
                        html+="<div class='panel-heading' role='tab' id='"+data.array[i].id+"'>";
                        html+="<a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#"+data.array[i].id+"1' aria-expanded='false' aria-controls='"+data.array[i].id+"1'>";
                        html+="<h4 class='panel-title'>"+data.fecha[i]+"<i class='material-icons'>keyboard_arrow_down</i></h4></a></div>";
                        html+="<div id='"+data.array[i].id+"1' class='panel-collapse collapse' role='tabpanel' aria-labelledby='"+data.array[i].id+"'>";
                        html+="<div class='panel-body'><table><tbody><tr><th>Atendido por: </th><td>&nbsp;</td><td> Dr/a. "+data.array[i].nombres_doctor.ucwords()+" "+data.array[i].apellidos_doctor.ucwords()+"</td><td>&nbsp;</td><td>&nbsp;</td><th>Especialidad:</th><td>&nbsp;</td><td>"+data.array[i].especialidad.ucwords()+"</td></tr></tbody></table><div id='divider'></div><ol><li><h6><strong>Síntomas</strong></h5><p align='justify'><small>"+data.array[i].sintomas+"</small></p></li>"
                        html+="<li><h6><strong>Exámenes</strong></h6><p align='justify'><small>"+data.array[i].examenes+"</small></p></li>";
                        html+="<li><h6><strong>Tratamiento</strong></h6><p align='justify'><small>"+data.array[i].tratamiento+"</small></p></li>";
                        html+="<li><h6><strong>Observaciones</strong></h6><p align='justify'><small>"+data.array[i].observaciones+"</small></p></li>";
                        html+="</ol></div></div></div></div>";
                }
            }
             $('#boton').html('<a href="pdf-expediente/'+data.paciente_id+'" id="download_expediente" class="btn btn-info pull-right"><span class="btn-label"><i class="material-icons">file_download</i></span>Descargar</a>')
            }else{

                html+="<p>Este paciente no tiene historial clínico</p>";
                $('#boton').html('<a href="#" data-dismiss="modal" class="btn btn-danger pull-right"><span class="btn-label"><i class="material-icons">close</i></span>Cerrar</a>')
            }
            $("#colapse").html(html)
            $(".title-name").html(data.paciente)
            
        },
        error:function(){
           alert('la operación falló');
        }
    })
}

function eliminar_recep(id)
{
    var popup = confirm("¿ Esta seguro de eliminar este registro ?")
    var route = "/recepcionistas/"+id+"";
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
function eliminar_doc(id)
{
    var popup = confirm("¿ Esta seguro de eliminar este registro ?")
    var route = "/doctores/"+id+"";
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    if(popup ==true){
     $.ajax({
            url: route,
            type: 'POST',
            data: {'_method' : 'DELETE', '_token' : csrf_token},
            success:function(data){
                $('#datatables').DataTable().ajax.reload();
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000});
            }, 
            error:function(){
                alert('la operación falló');
            }
       });
    }
}
function delete_paciente(id)
{
    $('#eliminar').html('<button type="button" class="btn btn-simple" data-dismiss="modal">Cancelar</button><a href="#" onclick="del_paciente('+id+')"; type="button" class="btn btn-success btn-simple">Sí, Borrar</a>')
}
function del_paciente(id)
{// elimina un paciente
    var route = "/pacientes/"+id+"";
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
     $.ajax({
            url: route,
            type: 'POST',
            data: {'_method' : 'DELETE', '_token' : csrf_token},
            success:function(data){
                $("#eliminar_paciente").modal("hide");
                $('#pacientes').DataTable().ajax.reload();
                $.notify({icon: "add_alert", message: data.message},{type: data.type, timer: 1000});
            }, 
            error:function(data){
                alert('la operación falló');
            }
       });
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



