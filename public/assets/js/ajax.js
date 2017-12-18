$(document).ready(function() {
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
	//$.fn.dataTable.ext.errMode = 'throw';  //Esto permite que no aparezca el alert() cuando el servidor responde con un error.
  	$('#datatables').DataTable({
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
});


	$( "#btn_update_doc" ).click(function(event){ 
		event.preventDefault();
		var id= $( '#id' ).val();
		var route = "/admin/doctores/"+id+"";
		var dataString  = $( '#update_doctor' ).serializeArray();		
		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
			type: 'PUT',
			datatype: 'json',
			data:dataString,
			success:function(data){
				if (data.success){ 
					//$('#name_avatar').html(res.name+'<i class="material-icons right">arrow_drop_down</i>');
					 $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000});
				}else{
					 $.notify({icon: "add_alert", message: data.message},{type: 'warning', timer: 1000});
				}           
			},
            error:function(data){
                console.log(data);
                var error = data.responseJSON.errors;
                console.log(error);
                for(var i in error){
                    var message = error[i];
                    $.notify({icon: "add_alert", message: message},{type: 'warning', timer: 1000});
                }
            }
		});
	});