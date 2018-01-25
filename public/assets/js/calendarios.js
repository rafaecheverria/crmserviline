$(document).ready(function() {
    $calendar = $('#citas_medicas');
            today = new Date();
            y = today.getFullYear();
            m = today.getMonth();
            d = today.getDate();

            $calendar.fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listYear',
                },
                defaultDate: today,
                selectable: true,
                selectHelper: true,
                navLinks: true,
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

                select: function(start, end) {
                    start = moment(start.format());
                    $("#fecha_inicio").val(start.format("YYYY-MM-DD"));
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
                events: "/admin/api",

                eventClick: function(event, jsEvent, view)
                {
                    var date_start = $.fullCalendar.moment(event.start).format('YYYY-MM-DD');
                    var time_start = $.fullCalendar.moment(event.start).format('HH:mm:ss');
                    var time_end = $.fullCalendar.moment(event.end).format('HH:mm:ss');
                    $("#up_evento #id").val(event.id);
                    $("#up_evento #fecha_inicio").datetimepicker({
                        format: 'YYYY-MM-DD',
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
                    $("#up_evento #doctor_id").val(event.doctor_id);
                    $("#up_evento #paciente_id").val(event.paciente_id);
                    $("#up_evento #descripcion").val(event.descripcion);
                    $('.selectpicker2').selectpicker('refresh')
                    $("#up_evento").modal("show");
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