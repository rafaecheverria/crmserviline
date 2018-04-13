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
                    right: 'year,month,agendaWeek,agendaDay,listYear, agregarEvento',
                },
                customButtons: {
                    agregarEvento: {
                      text: 'Agregar Evento',
                      click: function() {
                        alert('clicked the custom button!');
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
                    $("#fecha_inicio").val(start.format("DD-MM-YYYY"));
                    $('#hora_inicio').datetimepicker({
                        format: 'HH:mm:ss',
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
                        format: 'HH:mm:ss',
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
                        var date_start = $.fullCalendar.moment(event.start).format('DD-MM-YYYY');
                        var time_start = $.fullCalendar.moment(event.start).format('HH:mm:ss');
                        var time_end = $.fullCalendar.moment(event.end).format('HH:mm:ss');
                        $("#up_evento #id").val(event.id);
                        $("#up_evento #fecha_inicio").datetimepicker({
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
                        $("#up_evento #hora_inicio").datetimepicker({
                            format: 'HH:mm:ss',
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
                        $("#up_evento #hora_fin").datetimepicker({
                            format: 'HH:mm:ss',
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
                        $("#up_evento #paciente_id").val(event.paciente_id);
                        $("#up_evento #descripcion").val(event.descripcion);
                        $("#up_evento #speciality_id").val(event.speciality_id);
                        //$("#up_evento #doctor_id_").val(event.doctor_id);
                           // $('.selectpicker').selectpicker('refresh')
                           $.get("get-doctor/"+event.speciality_id+"",function(response,speciality){
                                $("#up_evento #doctor_id").empty();
                                if (response == "") {
                                     $("#up_evento #doctor_id").html("<option>--Seleccione--</option>")
                                }else{
                                    for(i = 0; i <response.length; i++) {
                                        $("#up_evento #doctor_id").append("<option value='"+response[i].id+"'>"+response[i].nombres+"</option>")
                                    }
                                    $('#up_evento #doctor_id').val(event.doctor_id)
                                }
                            })
                        $("#up_evento").modal("show");
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