$(document).ready(function(){

    $( ".prospecto" ).sortable({
      connectWith: [".contacto", ".reunion", ".propuesta", ".negociacion" ], 

    }).droppable({
      activeClass: "zona",
      hoverClass: "activo",
      drop: function( event, ui ) {
        //$( this ).find( ".placeholder" ).remove();//removemos el texto "Añadir producto"
        var id = ui.draggable.attr('id')//extraemos el id del objeto arrastrado
        var nombre = ui.draggable.attr('name')
        var estado = 1
        estado_crm(id, nombre, estado)
        //mostrar_cambiar_estado(id, nombre);
        //$("#select-estados").val(1);
        ///$(".selector_estados").hide()
        console.log(id)
        console.log(nombre)
        },
    });
    

    $( ".contacto" ).sortable({
      connectWith: [".reunion", ".propuesta", ".negociacion" ], 

    }).droppable({
      activeClass: "zona",
      hoverClass: "activo",
      drop: function( event, ui ) {
        var id = ui.draggable.attr('id');//extraemos el id del objeto arrastrado
        var nombre = ui.draggable.attr('name');
        var estado = 2;
        estado_crm(id, nombre, estado)
        //mostrar_cambiar_estado(id)
        estado_crm(id)
        console.log(nombre)
        $(".selector_estados").hide()
        console.log(id)


        },
    });


    $( ".reunion" ).sortable({
      connectWith: [".propuesta", ".negociacion" ], 

    }).droppable({
      activeClass: "zona",
      hoverClass: "activo",
      drop: function( event, ui ) {
        var id = ui.draggable.attr('id');//extraemos el id del objeto arrastrado
        var nombre = ui.draggable.attr('name');
        var estado = 3;
        estado_crm(id, nombre, estado)
        console.log(nombre)
        },
    });


    $( ".propuesta" ).sortable({
      connectWith: [".negociacion" ], 

    }).droppable({
      activeClass: "zona",
      hoverClass: "activo",
      drop: function( event, ui ) {
        var id = ui.draggable.attr('id');//extraemos el id del objeto arrastrado
        var nombre = ui.draggable.attr('name');
        var estado = 4;
        estado_crm(id, nombre, estado)
        console.log(nombre)
        },
    });


    $( ".negociacion" ).sortable({
      
    }).droppable({
      activeClass: "zona",
      hoverClass: "activo",
    }).droppable({
        drop: function( event, ui ) {
        var id = ui.draggable.attr('id');//extraemos el id del objeto arrastrado
        var nombre = ui.draggable.attr('name');
        var estado = 5;
        estado_crm(id, nombre, estado)
        console.log(nombre)
        },
    });


  });
async function estado_crm(organizacion_id, nombre, estado_id){
  var estado = 0;

  switch(estado_id){
    case 1: estado = 1;
    break;

    case 2: estado = 2;
    break;

    case 3: estado = 3;
    break;

    case 4: estado = 4;
    break;

    case 5: estado = 5;
    break;

    case 6: estado = 6;
    break;

    case 7: estado = 7;
    break;
  }

  //alert(estado)

    const {value: nota} = await swal({

      title: 'Cambiar de estado a '+nombre+'', //\"" +nombre+ "\"
      input: 'textarea',
      type: 'question',
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      confirmButtonText: 'Sí, Cambiar',
      cancelButtonText: 'Cancelar',
      buttonsStyling: false,
      inputPlaceholder: 'Escriba una nota que junstifique el cambio de estado.',
      showCancelButton: true,
      inputValidator: (value) => {
        return !value && 'Debe completar todos los campos!'
      }
    }).then((value) => {
      if (value.value) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content')
        $.ajax({
        url:  "/cambiar_estado/"+organizacion_id+"",
        type: 'POST',
        datatype: "json",
        data: {'_token' : csrf_token, 'estado_id': estado, 'nota': nota},
            success:function(data){
                $('#organizaciones').DataTable().ajax.reload();
                console.log(data)
                $.notify({icon: "add_alert", message: "la Empresa "+nombre+" ha sido activada exitosamente!"},{type: 'success', timer: 1000});
            }, 
            error:function(){
                $(elemento).siblings('input').prop('checked', !checked);
                alert('la operación falló');
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