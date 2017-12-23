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

$( "#guardar_doc" ).click(function(event){ 
        event.preventDefault();
        var dataString  = $( '#form_doc' ).serializeArray();
        var route = "/admin/doctores/create";
        $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
            type: 'post',
            datatype: 'json',
            data:dataString,

            beforeSend: function(){
                $("#guardar").text("Enviando...");
                $("#guardar").attr("disabled", true);
            },
            complete: function(data){
                $("#guardar").text("Enviar");
                $("#guardar").attr("disabled", false);
            },
            success:function(){
                toastr["success"]("Responderemos a su solicitud a la brevedad, gracias por escribirnos!","Mensaje Enviado:");
                $('#form_doc')[0].reset();
            },
            error:function(data){
                var error = data.responseJSON;
                for(var i in error){
                    for(var j in error[i]){
                        var message = error[i][j];
                        toastr.error(message);
                    }
                }
            }
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
					$('.apellidos_up').html(data.apellidos);
					 $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000});

				}else{
					 $.notify({icon: "add_alert", message: data.message},{type: 'warning', timer: 1000});
				}           
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