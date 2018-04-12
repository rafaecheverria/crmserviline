function redirect(ruta)
{
    window.location = ruta;
    //setTimeout("location."+ruta, 5000);
}
$(document).ready(function() {

    $("#speciality_id").change(event =>{
        $.get(`towns/${event.target.value}`, function(res, sta){
            $("town").empty();
            res.forEach(element => {
                $("#town").append(`<option value=${element.id}> ${element.name}<option>`)
            })
        })
    })

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
//          format: 'H:mm',    // use this format if you want the 24hours timepicker
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

$( "#delete_cita" ).click(function(event){ //esta funcion elimina una cita oendiente desde el cale ndario.
    event.preventDefault();
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
        event.preventDefault();
        var dataString  = $( '#form_cita' ).serializeArray();
        var route = "/citas";
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: route,
            type: 'post',
            datatype: 'json',
            data:dataString,
            success:function(data){
                console.log(data)
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
                $('#form_cita')[0].reset()
                $("#citas_medicas").fullCalendar('refetchEvents')
                $('#reserva').html(data.reserva)
                $('.selectpicker').selectpicker('refresh')
                $("#add_evento").modal("hide")

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

$( "#update_cita" ).click(function(event){ //esta funcion elimina una cita oendiente desde el Calendario.
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
        event.preventDefault()
        var id= $( '#id' ).val()
        var route = "/roles/"+id+""
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
/*$( "#update_antecedentes_paciente" ).click(function(event){ 
        event.preventDefault()
        var id= $( '#id_paciente' ).val()
        var route = "/antecedentes/"+id+""
        var dataString  = $( '#form_antecedente_paciente' ).serializeArray()
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: route,
            type: 'PUT',
            datatype: 'json',
            data:dataString,

            success:function(data){
                console.log(data)
                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
                $('#antecedentePersonalModal').modal('toggle');
            },
            error:function(data){
                console.log(data)
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
    })*/
$( "#update_editar_paciente" ).click(function(event){ 
        event.preventDefault()
        var id= $( '#id' ).val()
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
		var route = "/doctores/"+id+"";
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
		})
	})
    
$( "#btn_update_rec" ).click(function(event){ 
        event.preventDefault();
        var id= $( '#id' ).val();
        var route = "/recepcionistas/"+id+"";
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
        })
    })

$( "#add_paciente" ).click(function(event){ 
        event.preventDefault()
        var route = "/pacientes/"
        var dataString  = $( '#form_add_paciente' ).serializeArray()
        console.log(dataString)
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

$( "#ingresar" ).click(function(event){ 
        event.preventDefault();
        var dataString  = $( '#form_login' ).serializeArray();
        var route = "login";
        $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
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

// Subir Imagen de Perfil
    var $avatarInput, $avatarImage, $avatarForm;
    var avatarUrl;

    $(function(){
    
        $avatarInput = $('#avatarInput');
        $avatarImage = $('.avatarImage');
        $avatarForm = $('#avatarForm');
        avatarUrl = "/users/avatar";
        $id = $('#id').val();

        $avatarImage.on('click', function(){    
            $avatarInput.click()
        });
        
        $avatarInput.on('change', function(){

        var formData = new FormData();
        formData.append('avatar', $avatarInput[0].files[0]);

            $.ajax({
                headers: {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
                url: avatarUrl+'?'+$avatarForm.serialize(),
                method: 'POST',
                data: formData,
                cache: true,
                processData: false,
                contentType: false,

            beforeSend: function(){
                    $avatarImage.attr('src', '/assets/img/touchloader.gif');
            },
            success: function(data){
                    $avatarImage.attr('src', '/assets/img/perfiles/'+data.file_name+'?'+ new Date().getTime());
                    $('#pacientes').DataTable().ajax.reload();
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


function roles_user(id)
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

function carga_paciente(id)
{
   //event.preventDefault(); este evento no funciona con firefox y envia error, no cargan los datos en el modal.
   var route = "/pacientes/"+id+"/edit";
   var csrf_token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
           url: route,
           type: 'GET',
        success:function(data){
            $('#id').val(data.id)
            $(".avatarImage").attr('src', 'assets/img/perfiles/'+data.avatar+'?'+ new Date().getTime());
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
           alert('la operación falló');
          }
    });
}

function ficha_paciente(id)
{
   var route = "/ficha/"+id+"";
   var csrf_token = $('meta[name="csrf-token"]').attr('content');
   var image = new Image();
    $.ajax({
           url: route,
           type: 'GET',
        success:function(data){
            $('#id').val(data.id)
            $(".avatarImage").attr('src', 'assets/img/perfiles/'+data.avatar+'?'+ new Date().getTime());
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

function eliminar_recep(id)
{
    event.preventDefault();
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
    event.preventDefault();
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
    event.preventDefault();
    $('#eliminar').html('<button type="button" class="btn btn-simple" data-dismiss="modal">Cancelar</button><a href="#" onclick="del_paciente('+id+')"; type="button" class="btn btn-success btn-simple">Sí, Borrar</a>')
}
function del_paciente(id)
{// elimina un paciente
    event.preventDefault();
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
                console.log(data)
                //alert('la operación falló');
            }
       });
}

function atender(id)
{ //Carga mestra el modal para realizar una atención.
    var route = "/atender/"+id+"";
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
           url: route,
           type: 'GET',
        success:function(data){
            $('#edad').html(data.edad)
            $('#visitas').html(data.visitas)
            $('#paciente').html(data.paciente)
            $('#id').val(data.id)
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
            console.log(data)
            $('#edad_').html(data.edad)
            $('#visitas_').html(data.visitas)
            $('#paciente_').html(data.paciente)
            $('#sintomas_').val(data.sintomas)
            $('#examenes_').val(data.examenes)
            $('#tratamiento_').val(data.tratamiento)
            $('#observacion_').val(data.observacion)
            $('#id').val(data.id)
          },
       error:function(){
           alert('la operación falló');
          }
    });
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
                $("#fecha_inicio").val(data.fecha_inicio)
                $("#hora_inicio").val(data.hora_inicio)
                $('#hora_fin').val(data.hora_fin)
                $('#paciente_id').val(data.paciente)
                $('#speciality_id').val(data.especialidad)
                $('#doctor_id').val(data.doctor)
                $('#descripcion').val(data.descripcion)

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

