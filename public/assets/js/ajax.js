/*$(document).on('click', '.pagination a', function(e)
{
	e.preventDefault();
	var url = $(this).attr("href");

	$.ajax({
		url: url,
		data:{page: $(this).attr('href').split('page=')[1]},
		type:'GET',
		dataType:'json',

		success:function(result){
			$('#div_lista').html(result);
		},
		fail:function(result){
			console.log(result);
		}
	});

});*/

/*$(document).on('submit','#formbuscar', function(e)
{
	e.preventDefault();
	alert();
	var url  = "admin/get_doctor_info_by_search";
	var data  = $( '#formbuscar' ).serialize();

	//alert(url);

	$.ajax({
		type:'get',
		url: url,
		data:data
		success:function(data){
			console.log(data);
			$('#div_lista').html(data);
		},
	});

	});*/

/*$( "#buscar" ).click(function(event){ 
		event.preventDefault();
		var dataString  = $( '#form_contacto' ).serializeArray();
		var route = "contacto";


		alert(route);
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
				$('#form_contacto')[0].reset();
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
		});*/



/*$(document).on('click','.pagination a', function(e)
{
	var page = $(this).attr('href').split('page=')[1];	
	getDoctor(page,$('#buscar').val());
});


function getDoctor(page,buscar)
{
	var url = "admin/doctores";
	$.ajax({
		type:'get',
		url: url+'?page='+page,
		data:{'buscar':buscar}

		}).done(function(data){
			$('#div_lista').html(data);
		})	
	}

*/
/*$( "#buscar-btn" ).click(function(event){ 

	var parametro = $('#type').val();
	var buscar = $('#buscar').val();
	var url = $(this).attr("href");

	$.ajax({
		url: "/admin/doctores",
		data:{buscar:buscar,page: $(this).attr('href').split('page=')[1]},
		type:'GET',
		dataType:'json',

		success:function(result){

			alert(result);
			$('#div_lista').html(result);
			console.log(result);
		},
		fail:function(result){
			//alert(result.status+': '+result.statusText);
			console.log(result);
		}
	});
	
	});*/

	$(document).ready(function() {
        $('#datatables').DataTable({

        	//processing: true,
        	serverSide: true,
        	//languaje: {"/plugins/datatables/latino.json"},
        	ajax: "/admin/get_doctor",
            pagingType: "full_numbers",
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Buscar Registros",
            },
            columns:[

            	{data: 'rut' , name: 'rut'},
            	{data: 'name', name: 'name'},
            	{data: 'last_name', name: 'last_name'},
            	{data: 'phone', name:'phone'},
            	{data: 'email', name:'email'}
            ]
        });


        var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });