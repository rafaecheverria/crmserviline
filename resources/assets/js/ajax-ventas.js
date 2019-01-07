//Inicia crud contacto
$(document).ready(function() {

	$('#modal_categoria').on('shown.bs.modal', function () {

    	$('#categoria').focus()

	})

/*===========================================================================================================
                    CAPTURA LA CATEGORIA SELECCIONADA Y ASIGNA UN CÓDICO AL PRODUCTO
============================================================================================================*/

$("#categoria_id").change(function(){

    var categoria_id = $(this).val();

    if (categoria_id == 0) {

        $("#codigo").val("")

    }else{

        var datos = new FormData();

        datos.append("categoria_id", categoria_id)

        $.ajax({

            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

            url:"crearCodigoProducto/"+categoria_id+"",

            method:"GET",

            cache: false,

            contentType: false,

            processData: false,

            success:function(data){

                if (data.length == 0) {

                    $("#codigo").val(0)

                    $.notify({icon: "add_alert", message: "Esta categoria no tiene nigun producto asiganado, por lo tanto no contiene un codigo inicial"},{type: 'danger', timer: 1000})

                }else{

                     $("#codigo").val(Number(data[0].codigo)+1)

                }

            }

        })

    }

})

})

/*==========================================================================================================
          								CRUD CATEGORIA
============================================================================================================*/

function mostrar_categoria(id){

   $("#modal_categoria").modal('show')

   if (id == 0) { //Si el id es igual a cero, significa que el modal es llamado desde el boton agregar categoria

	    $('#form_categoria')[0].reset()

	    $("#btn-categoria").html('<a href="#" onclick="agregarCategoria(0,1)" class="btn btn-primary pull-right">Agregar</a>')

        
    }else{ // si el id viene con un valor, significa que el modal es llamado desde un botón editar categoria

        $("#btn-categoria").html('<a href="#" onclick="agregarCategoria('+id+',2)" class="btn btn-primary pull-right">Actualizar</a>')

	        
	        $.ajax({

	            url: "categorias/"+id+"/edit",

	            type: "GET",

	            success:function(data){

	                $("#categoria").val(data.categoria)
	            
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

	}


function agregarCategoria(id,tipo){

    var dataString  = $( '#form_categoria' ).serializeArray()

    var dataType = "JSON"

    var headers = {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')};

    if (id > 0) { // si el id es mayo a 0 significa que la llamada es para editar

        var type = "PUT"

        var route = "/categorias/"+id+""

            $.ajax({

            headers: headers,

            url: route,

            type: type,

            datatype: dataType,

            data:dataString,

            success:function(data){

                $("#modal_categoria").modal('hide')

                $('#form_categoria')[0].reset()

                $('#categorias').DataTable().ajax.reload()

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

    }else{

        var type = "POST"

        var route = "categorias"

        $.ajax({

        headers: headers,

        url: route,

        type: type,

        datatype: dataType,

        data:dataString,

            success:function(data){

                $("#modal_categoria").modal('hide')

                $('#form_categoria')[0].reset()

                $('#categorias').DataTable().ajax.reload()

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

    } 

}

/*==========================================================================================================
                                        CRUD PRODUCTOS
============================================================================================================*/

function mostrar_productos(id){

  $("#modal_productos").modal('show')

   //Si el id es igual a cero, significa que el modal es llamado desde el boton agregar producto

   if (id == 0) { 

        $('#form_producto')[0].reset()

        $("#btn-producto").html('<a href="#" onclick="agregarProducto(0,1)" class="btn btn-primary left">Agregar</a>')

        
    }else{ // si el id viene con un valor, significa que el modal es llamado desde un botón editar producto

        $("#btn-producto").html('<a href="#" onclick="agregarProducto('+id+',2)" class="btn btn-primary pull-right">Actualizar</a>')

            
        $.ajax({

            url: "productos/"+id+"/edit",

            type: "GET",

            success:function(data){

                // SE CARGAN LOS DATOS DEL PRODUCTO AL FORMULARIO
            
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

}

function agregarProducto(id, tipo){

     var dataString  = $( '#form_producto' ).serializeArray()

    if (!id) {

        console.log(dataString)

    }

}

// Subir Imagen de Producto

    $(function(){
    
        var imagen_default = $('#imagen_default')

        var imagen = $('.imagen')

        imagen.on('click', function(){   

        imagen_default.click()

            console.log(imagen_default.val())

           

        })
 imagen.val(imagen_default.val())

})