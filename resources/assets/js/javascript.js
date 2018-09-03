function mod(id){
	//alert(id);
	//url = '../../vista/personas/ficha_persona.php';
	var url = '../../php/ficha_persona.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success:function(data){
			//alert(data);
			$('#datos').html(data);
			/*var array = eval(data);
			$('#agrega-registros').html(array[0]);
			$('#pagination').html(array[1]);*/
		}
	});
	return false;
}

function edit(id) {
	alert(id);
}

function pagination(partida){
	var lista = $('div#lista').html('<p><img src="../../assets/img/animation3.gif" /></p>');
	var busqueda = $('#busqueda').val();
	var tipo = $('#tipo').val();
		var url = '../../controlador/controlador_personas.php';
		$.ajax({
			type:'POST',
			url:url,
			data:"partida="+partida+"&tipo="+tipo+"&busqueda="+busqueda+"&boton=buscar",
			success:function(data){
			//alert(data);
				var array = eval(data);
				lista.html(array[0]);
				$('#paginador').html(array[1]);
			}
		});
		return false;
}

function eliminar(id){
	//alert(id);
	swal({
	  title: 'Esta Seguro?',
	  text: "Usted va a eliminar a un profesor del sistema, después de hacerlo, no podrá revertir la operación !",
	  type: 'warning',
		confirmButtonClass: "btn btn-success",
		cancelButtonClass: "btn btn-danger",
		buttonsStyling: false,
	  showCancelButton: true,
	  //confirmButtonColor: '#3085d6',
		allowEscapeKey: false,
	 // cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
	  confirmButtonText: 'Eliminar',
		allowOutsideClick: false
	}).then(function () {
		$.ajax({
			url:'../../controlador/controlador_personas.php',
			type:'POST',
			data:'id='+id+'&boton=eliminar'
		}).done(function(resp){
			if(resp === '1'){
				swal(
				 'Eliminado!',
				 'Su registro ha sido eliminado correctamente.',
				 'success'
			 )
			}else{
				swal(
				 'Aviso!',
				 'Su registro no ha sido eliminado debido a que tiene claves foráneas.',
				 'error',
			 	 )
			}
		})
		pagination(1);
	})
}

function cargar_datos(id){ //Funcion que carga los datos del registro seleccionado al formulario modal de bootstrap
	//$('#usuarios')[0].reset();
	//alert(id);
		url = '../../vista/personas/ficha_persona.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id+'&boton=cargar_datos_modal',
		success: function(valores){

			//alert(valores);

			//  var datos = eval(valores);
				//alert(datos);
			  /*$('#rut').hide();
			  $('#rut').attr('readonly', true).val(rut);
			  $('#nombres').val(datos[1]);
			  $('#apellidos').val(datos[2]);
			  $('#correo').val(datos[3]);
			  $('#modal1').modal({
				  show:true,
				  backdrop:'static'
			  });
			return false;*/
		}

	});

	return false;
}
function may(obj, id){
	obj = obj.toUpperCase();
	document.getElementById(id).value = obj;
}

	function actualizar() //Guarda personas con validaciones incluidas
	{
		var url = '../../controlador/controlador_personas.php';
		var datos_formulario = $('#up_personas').serialize();
		//alert(datos_formulario);
				$.ajax({
					type:'POST',
					url:url,
					data:datos_formulario+"&boton=actualizar",
					success: function(res){
						//alert(res);
						switch (res) {
							case '0':
								Materialize.toast('EXISTEN CAMPOS REQUERIDOS QUE SE ENCUENTRAN VACÍOS, POR FAVOR VERIFIQUE !', 3000, 'red', 'bottom') // 'rounded' is the class I'm applying to the toast				$('#guardar_usuario')[0].reset();
							break;
							case '1':
								Materialize.toast('EL NOMBRE SOLO DEBE CONTENER LETRAS !', 3000, 'red', 'bottom') // 'rounded' is the class I'm applying to the toast				$('#guardar_usuario')[0].reset();
								$('#nombres').focus();
							break;
							case '2':
								Materialize.toast('EL APELLIDO SOLO DEBE CONTENER LETRAS !', 3000, 'red', 'bottom') // 'rounded' is the class I'm applying to the toast				$('#guardar_usuario')[0].reset();
								$('#apellidos').focus();
							break;
							case '3':
								Materialize.toast('LA DIRECCIÓN CONTIENE CARACTERES QUE NO ESTÁN PERMITIDOS, POR FAVOR VERIFIQUE !', 3000, 'red', 'bottom') // 'rounded' is the class I'm applying to the toast				$('#guardar_usuario')[0].reset();
								$('#direccion').focus();
							break;
							case '5':
								Materialize.toast('EL TELEFONO CONTIENE CARACTERES QUE NO ESTÁN PERMITIDOS, POR FAVOR VERIFIQUE !', 3000, 'red', 'bottom') // 'rounded' is the class I'm applying to the toast				$('#guardar_usuario')[0].reset();
								$('#password').focus();
							break;
							case '6':
								Materialize.toast('EL CORREO ELECTRÓNICO QUE INGRESO TIENE UN FORMATO INCORRECTO !', 3000, 'red', 'bottom') // 'rounded' is the class I'm applying to the toast				$('#guardar_usuario')[0].reset();
							break;
							case '9':
								Materialize.toast('LOS DATOS SE ACTUALIZARON CORRECTAMENTE !', 3000, 'green', 'bottom') // 'rounded' is the class I'm applying to the toast				$('#guardar_usuario')[0].reset();
							break;
						}
					}
				});
		}
		function setFormValidation(id) {
        $(id).validate({
            errorPlacement: function(error, element) {
                $(element).parent('div').addClass('has-error');
            }
        });
    }

$(document).ready(function(e) {
pagination(1);
$('#modalContainer').on('show', function () {
   $('#rut').focus();
});
/* Inserta Profesor */
	$('#in_profesor').on('submit', function(event){
			event.preventDefault();
			setFormValidation('#in_profesor');
			var url = '../../controlador/controlador_personas.php';
			var formData = new FormData($('#in_profesor')[0]);
			$.ajax({
				type:'POST',
				url:url,
				data:formData,
				cache:false,
				processData:false,
				contentType:false,
				success: function(res){
					//alert(res);
					switch (res){
						case '7':
							$.notify('<b>El formato de la imagen no es aceptado</b>, pruebe con formatos JPG, PNG, JPEG.', { type: 'warning' }); // 'rounded' is the class I'm applying to the toast				$('#guardar_usuario')[0].reset();
						break;
						case '8': // EL USUARIOS YA EXISTE !
						$.notify('<b>El rut ya se encuentra registrado</b> en la base de datos, por favor verifique y vuelva a intentarlo.', { type: 'warning' });
						//$('#rut').focus();
							//Materialize.toast('LA PERSONA YA SE ENCUENTRA REGISTRADA !', 3000, 'red', 'bottom') // 'rounded' is the class I'm applying to the toast				$('#guardar_usuario')[0].reset();
						break;
						case '9':
							$.notify('El profesor <b>se ha ingresado</b> con exito', { type: 'success' });
							document.getElementById("in_profesor").reset();
							$('#myModal').modal('hide');
							pagination(1);
						 //	mensage = $.notify("El profesor <b>se ha ingresado</b> con exito.");
							//Materialize.toast('LOS DATOS FUERON INGRESADOS CORRECTAMENTE!', 3000, 'green', 'bottom') // 'rounded' is the class I'm applying to the toast				$('#guardar_usuario')[0].reset();
							//document.getElementById("personas").reset();
						break;
					}
				}
			});
	});

	$('#password').change(function(event){
		if ($('#password').val().length < 4 || $('#password').val().length > 4){
			Materialize.toast('LA CONTRASEÑA DEBE CONTENER 4 DIGITOS', 3000, 'red', 'bottom') // 'rounded' is the class I'm applying to the toast				$('#guardar_usuario')[0].reset();
			$('#password').val("");
			$('#ver_pass').val("");
			document.getElementById("ver_pass").disabled = true;
			$('#ver_pass').focus();
		}else{
			document.getElementById("ver_pass").disabled = false;
		}
	});

	$('#ver_pass').change(function(event){
		if ($('#password').val() == $('#ver_pass').val()){
			Materialize.toast('EXCELENTE, LAS CONTRSEÑAS COINCIDEN !!!', 3000, 'green', 'bottom') // 'rounded' is the class I'm applying to the toast				$('#guardar_usuario')[0].reset();
		}else{
			Materialize.toast('LAS CONTRASEÑAS NO COICIDEN !!', 3000, 'red', 'bottom') // 'rounded' is the class I'm applying to the toast				$('#guardar_usuario')[0].reset();
			$('#ver_pass').val("");
			$('#password').focus();
		}
	});
	$('#limpiar').click(function(){
		$('#busqueda').val('');
		$('#tipo').val('');
		pagination(1);
	});
	$('#bs-prod').click(function(){
		pagination(1);
	});

	

	// ######### SCRIPT ANTIGUO DEL SISTEMA ######## //
	//######### BUSCAR #########//
	$('#tipo').change(function(){
			var $select = $(this).find('option:selected');
			var valor = $select.val();
			//alert(valor);
			//var texto = $select.text();
			var campo = '';
				switch(valor){
					case '0':
						campo = '<label class="control-label">Ej: 12345678-9</label><input id="busqueda" type="text" class="form-control">';
						document.getElementsByName('busqueda').item(0).value = '';
						pagination(1);
					break;
					case 'rut':
						campo = '<label class="control-label">Ej: 12345678-9</label><input id="busqueda" type="text" class="form-control" autofocus>';
					break;
					case 'nombres':
						campo = '<label class="control-label">Ej: Juan Andrés</label><input id="busqueda" type="text" class="form-control" autofocus>';
					break;
					case 'apellidos':
						campo = '<label class="control-label">Ej: González Martínez</label><input id="busqueda" type="text" class="form-control" autofocus>';
					break;
				}
				$("#busca").empty();
				$("#busca").html(campo);
			});

});
