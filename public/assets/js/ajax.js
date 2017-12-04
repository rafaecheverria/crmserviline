	$(document).ready(function() {
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
            	{data: 'id', name: 'id'},
            	{data: 'rut', name: 'rut'},
            	{data: 'name', name: 'name'},
            	{data: 'last_name', name: 'last_name'},
            	{data: 'phone', name: 'phone'},
            	{data: 'email', name: 'email'},
            	{data: 'action', name: 'action', orderable: false, searchable: false}
            ]
	    });

});


	$( "#update_profile" ).click(function(event){ 
		event.preventDefault();
		var id= $('#id').val();
		alert(id);
		/*var route = "/usuarios/perfil/"+id+"";
		var dataString  = $( '#form_profile' ).serializeArray();		
		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN':$('input[name=_token]').attr('content')},
			type: 'PUT',
			datatype: 'json',
			data:dataString,
			success:function(res){
				if (res.success){ 
					$('#name_avatar').html(res.name+'<i class="material-icons right">arrow_drop_down</i>');
					toastr["success"](res.message);
				}else{
					toastr["error"](res.message);
				}
			},
		});*/
	});