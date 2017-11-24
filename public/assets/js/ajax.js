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
$('#formbuscar').on('submit', function(e)
{
	e.preventDefault();
	
	var url  = "/admin/doctores";
	var data  = $( '#formbuscar' ).serialize();

	$.ajax({
		type:'get',
		url: url,
		data:data
		success:function(data){
			alert(data);
			//$('#div_lista').html(data);
		},
	});

});


$(document).on('click','.pagination a', function(e)
{
	var page = $(this).attr('href').split('page=')[1];	
});
/*function getDoctor(page,buscar)
{
	var url = "{{admin/getdoctorinfosearch}}";
	$.ajax({
		type:'get',
		url: url+'?page='+page,
		data:{'buscar':buscar}
		success:function(data){
			$('#div_lista').html(data);
		},
	});
}*/

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