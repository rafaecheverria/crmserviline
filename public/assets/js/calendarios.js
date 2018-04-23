$(document).ready(function() {
    $calendar = $('#citas_medicas');
            today = new Date();
            y = today.getFullYear();
            m = today.getMonth();
            d = today.getDate();

            $calendar.fullCalendar({
                header: {
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    left: 'title',
                    center: 'today prev,next',
                    right: 'year,month,agendaWeek,agendaDay,listYear, actualizar, agregarEvento',
                },
                customButtons: {
                    actualizar: { 
                       text: 'Actualizar',
                       click: function() {
                        $("#citas_medicas").fullCalendar('refetchEvents')
                       }
                    },
                    agregarEvento: {
                      text: '+',
                      click: function() {
                        document.getElementById("fecha_inicio").readOnly = false;
                        $("#fecha_inicio").datetimepicker({
                            format: 'DD-MM-YYYY',
                            icons : {
                                up: "fa fa-chevron-up",
                                down: "fa fa-chevron-down",
                                previous: 'fa fa-chevron-left',
                                next: 'fa fa-chevron-right',
                                today: 'fa fa-screenshot',
                                clear: 'fa fa-trash',
                                close: 'fa fa-remove',
                            }
                        });
                        $('#hora_inicio').datetimepicker({
                            format: 'HH:mm',
                            icons : {
                                up: "fa fa-chevron-up",
                                down: "fa fa-chevron-down",
                                previous: 'fa fa-chevron-left',
                                next: 'fa fa-chevron-right',
                                today: 'fa fa-screenshot',
                                clear: 'fa fa-trash',
                                close: 'fa fa-remove',
                            }
                        })
                        $('#hora_fin').datetimepicker({
                            format: 'HH:mm',
                            icons : {
                                up: "fa fa-chevron-up",
                                down: "fa fa-chevron-down",
                                previous: 'fa fa-chevron-left',
                                next: 'fa fa-chevron-right',
                                today: 'fa fa-screenshot',
                                clear: 'fa fa-trash',
                                close: 'fa fa-remove',
                            }
                        })

                       var doctor_id = $("#doctor_id_add").val() //carga las especialidades del doctor en sesion a un select "speciality_id"
                       select_especialidad_add(doctor_id)
                       $("#add_evento").modal("show")
                       $('.selectpicker').selectpicker('refresh')
                       
                      }
                    }
                  },
                defaultDate: today,
                selectable: true,
                selectHelper: true,
                navLinks: true,
                locale:'es',
                views: {
                    month: { // name of view
                        titleFormat: 'MMMM YYYY'
                        // other view-specific options here
                    },
                    week: {
                        titleFormat: " MMMM D YYYY"
                    },
                    day: {
                        titleFormat: 'D MMM, YYYY'
                    }
                },

                select: function(start, end) { //evento que abre el modal agregar.

                start = moment(start.format());
                    $("#fecha_inicio").val(start.format("DD-MM-YYYY"))
                    $('#hora_inicio').datetimepicker({
                        format: 'HH:mm',
                        icons : {
                            up: "fa fa-chevron-up",
                            down: "fa fa-chevron-down",
                            previous: 'fa fa-chevron-left',
                            next: 'fa fa-chevron-right',
                            today: 'fa fa-screenshot',
                            clear: 'fa fa-trash',
                            close: 'fa fa-remove',
                        }
                    })
                    $('#hora_fin').datetimepicker({
                        format: 'HH:mm',
                        icons : {
                            up: "fa fa-chevron-up",
                            down: "fa fa-chevron-down",
                            previous: 'fa fa-chevron-left',
                            next: 'fa fa-chevron-right',
                            today: 'fa fa-screenshot',
                            clear: 'fa fa-trash',
                            close: 'fa fa-remove',
                        }
                    })

                   var doctor_id = $("#doctor_id_add").val() //carga las especialidades del doctor en sesion a un select "speciality_id"
                   select_especialidad_add(doctor_id)
                  // $('#form_cita')[0].reset()
                   $('.selectpicker').selectpicker('refresh')
                   $("#add_evento").modal("show")
                },
                editable: true,
                eventLimit: true, 
                events: "api",

                eventDrop: function(event, delta, revertFunc, jsEvent, ui, view) // Evento que modifica datos al arrastrar el evento en el calendario.
                {
                    var title = event.title;
                    var start = $.fullCalendar.moment(event.start).format('YYYY-MM-DD');
                    var end = (event.end == null) ? start : event.end.format();
                    var time_start = $.fullCalendar.moment(event.start).format('HH:mm:ss');
                    var time_end = $.fullCalendar.moment(event.end).format('HH:mm:ss');
                    var id= event.id;
                    var estado = event.estado;
                    var route = "/citas/"+id+"";
                    var dataString  = 'type=resetdate&fecha_inicio='+start+'&fecha_fin='+end+'&id='+id+'&hora_inicio='+time_start+'&hora_fin='+time_end+'&paciente_id='+event.paciente_id+'&doctor_id='+event.doctor_id+'&speciality_id='+event.speciality_id;

                    if (estado == 'atendido') {
                        revertFunc();
                        $.notify({icon: "add_alert", message: 'Esta consulta no se puede modificar porque ya fue atendida.'},{type: 'warning', timer: 1000})
                        //$("#citas_medicas").fullCalendar('refetchEvents')
                    }else{
                        
                        $.ajax({
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            url: route,
                            type: 'PUT',
                            datatype: 'json',
                            data:dataString,

                            success:function(data){
                                $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
                                $("#citas_medicas").fullCalendar('refetchEvents')
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
                   
                },

                eventClick: function(event, jsEvent, view)
                {
                    var estado = event.estado;
                    if (estado == "atendido") {
                        $.notify({icon: "add_alert", message: 'Esta consulta no se puede modificar porque ya fue atendida.'},{type: 'warning', timer: 1000})
                    }else{
                        var especialidad = event.speciality_id;
                        var date_start = $.fullCalendar.moment(event.start).format('DD-MM-YYYY');
                        var time_start = $.fullCalendar.moment(event.start).format('HH:mm');
                        var time_end = $.fullCalendar.moment(event.end).format('HH:mm');
                        $("#up_evento #id").val(event.id);
                        $("#up_evento #fecha_inicio_e").datetimepicker({
                            format: 'DD-MM-YYYY',
                            icons : {
                                up: "fa fa-chevron-up",
                                down: "fa fa-chevron-down",
                                previous: 'fa fa-chevron-left',
                                next: 'fa fa-chevron-right',
                                today: 'fa fa-screenshot',
                                clear: 'fa fa-trash',
                                close: 'fa fa-remove',
                            }
                        }).val(date_start);
                        $("#up_evento #hora_inicio_e").datetimepicker({
                            format: 'HH:mm',
                            icons : {
                                up: "fa fa-chevron-up",
                                down: "fa fa-chevron-down",
                                previous: 'fa fa-chevron-left',
                                next: 'fa fa-chevron-right',
                                today: 'fa fa-screenshot',
                                clear: 'fa fa-trash',
                                close: 'fa fa-remove',
                            }
                        }).val(time_start);
                        $("#up_evento #hora_fin_e").datetimepicker({
                            format: 'HH:mm',
                            icons : {
                                up: "fa fa-chevron-up",
                                down: "fa fa-chevron-down",
                                previous: 'fa fa-chevron-left',
                                next: 'fa fa-chevron-right',
                                today: 'fa fa-screenshot',
                                clear: 'fa fa-trash',
                                close: 'fa fa-remove',
                            }
                        }).val(time_end);
                        $("#up_evento #paciente_id_e").val(event.paciente_id)
                        $("#up_evento #descripcion_e").val(event.descripcion)
                        $("#up_evento #speciality_id_e").val(especialidad)
                        var doctor_id = $("#doctor_id_e_up").val()
                        getDoctorUp(especialidad, event.doctor_id)
                        select_especialidad_up(doctor_id, especialidad)
                        $("#up_evento").modal("show")
                        }
                    },
                })

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
    })
        
})