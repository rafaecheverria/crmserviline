$(document).ready(function(){

    $( ".prospecto" ).sortable({
      connectWith: [".contacto", ".reunion", ".propuesta", ".negociacion" ], 

    }).droppable({
      activeClass: "zona",
      hoverClass: "activo",
      drop: function( event, ui ) {
        //$( this ).find( ".placeholder" ).remove();//removemos el texto "Añadir producto"
        var id = ui.draggable.attr('id');//extraemos el id del objeto arrastrado
        var nombre = ui.draggable.attr('name');
        mostrar_cambiar_estado(id, nombre);
        //$("#select-estados").val(1);
        $(".selector_estados").hide()
        console.log(id);
        console.log(nombre);
        },
    });
    

    $( ".contacto" ).sortable({
      connectWith: [".reunion", ".propuesta", ".negociacion" ], 

    }).droppable({
      activeClass: "zona",
      hoverClass: "activo",
      drop: function( event, ui ) {
        var id = ui.draggable.attr('id');//extraemos el id del objeto arrastrado
        var nombre = 
        mostrar_cambiar_estado(id);
        console.log(id);


        },
    });


    $( ".reunion" ).sortable({
      connectWith: [".propuesta", ".negociacion" ], 

    }).droppable({
      activeClass: "zona",
      hoverClass: "activo",
      drop: function( event, ui ) {
        var id = ui.draggable.attr('id');//extraemos el id del objeto arrastrado
        console.log(id);
        cambiar_estado(id);
        },
    });


    $( ".propuesta" ).sortable({
      connectWith: [".negociacion" ], 

    }).droppable({
      activeClass: "zona",
      hoverClass: "activo",
      drop: function( event, ui ) {
        var id = ui.draggable.attr('id');//extraemos el id del objeto arrastrado
        cambiar_estado(id);
        console.log(id);
        },
    });


    $( ".negociacion" ).sortable({
      
    }).droppable({
      activeClass: "zona",
      hoverClass: "activo",
    }).droppable({
        drop: function( event, ui ) {
        var id = ui.draggable.attr('id');//extraemos el id del objeto arrastrado
        cambiar_estado(id);
        console.log(id);
        },
    });


  });
function estado_crm(organizacion_id){
    const swalWithBootstrapButtons = swal.mixin({
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false,
    })

swalWithBootstrapButtons({
    title: '¿Estás seguro que quieres cambiar el estado de esta empresa?',
    text: "Si aceptas, NO PODRÁS VOLVER AL ESTADO ACTUAL.!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Si, Cambiar!',
    cancelButtonText: 'No, cancelar!',
    reverseButtons: true
    }).then((result) => {
      if (result.value) {
        var dataString  = $( '#form_cambiar_estado' ).serializeArray()
        var csrf_token = $('meta[name="csrf-token"]').attr('content')
        var route = "/cambiar_estado/"+organizacion_id+"";
        $.ajax({
            headers: csrf_token,
            url: route,
            datatype: "json",
            type: 'POST',
            data: dataString,
            beforeSend: function(){
                $("#boton-cambiar-estado").html("<a class='btn btn-primary btn pull-right'>Cambiar Estado <i class='fa fa-2px fa-spinner'></i></a>");
                },
           success:function(data){
              $.notify({icon: "add_alert", message: data.message},{type: 'success', timer: 1000})
              $("#modal_cambiar_estado").modal("hide");
              $(".nota").html("");
              $('#organizaciones').DataTable().ajax.reload();
            }
        })
      } 
    })
}
 /*$(function() 
		{
      $( "#drag" ).draggable({//propiedades 
        appendTo: "body",
        helper: "clone"
      });
  
      $( "#cart a" ).droppable({
        activeClass: "zona",
        hoverClass: "active",
        drop: function( event, ui ) {
		
          $( this ).find( ".placeholder" ).remove();//removemos el texto "Añadir producto"
	  
	  var id = ui.draggable.attr('id');//extraemos el id del objeto arrastrado
	  
	  var idprod = saveart(id);			  
	  
          $( '<li id="fila'+idprod+'"></li>' ).html( ui.draggable.text()+'<span class="quitar" onclick="quitarprod('+idprod+')">quitar</span>' ).appendTo( this );
	  
	  
        }
      }).sortable({
        items: "a:not(.placeholder)",
        sort: function() {

        }
      });
    });*/