$(document).ready(function(){

  //LISTA DE EMPRESAS PROPECTOS
  
  $(".prospecto").sortable({

    connectWith: [".contacto", ".reunion", ".propuesta", ".negociacion" ], 

    revert: "invalid", //crea el efecto de transición cuando se suelta el elemento

    items: "li:not(.titulos)",

    //placeholder: "sortable-placeholder",

  }).droppable({

     activeClass: "activo",

     hoverClass: "zona" 

  })

  //LISTA DE EMPRESAS CONTACTOS

  $(".contacto").sortable({

    connectWith: [".reunion", ".propuesta", ".negociacion" ], 

    revert: "invalid",

    items: "li:not(.titulos)",

     receive: function(ev, ui)
      {

        var id = ui.item.attr('id')

        var name = ui.item.attr('name')

        var estado = 2

        estado_crm(id, name, estado)

      },

  }).droppable({

     activeClass: "activo",

     hoverClass: "zona" 

  })

  //LISTA DE EMPRESAS REUNIÓN

  $(".reunion").sortable({

    connectWith: [".propuesta", ".negociacion" ], 

    revert: "invalid",

    items: "li:not(.titulos)",

     receive: function(ev, ui)

      {

        var id = ui.item.attr('id')

        var name = ui.item.attr('name')

        var estado = 3;

        estado_crm(id, name, estado)

      },

  }).droppable({

     activeClass: "activo",

     hoverClass: "zona" 

  })

  //LISTA DE EMPRESAS PROPUESTA

  $(".propuesta").sortable({

    connectWith: [".negociacion" ], 

    revert: "invalid",

    items: "li:not(.titulos)",

     receive: function(ev, ui)

      {

        var id = ui.item.attr('id')

        var name = ui.item.attr('name')

        var estado = 4;

        estado_crm(id, name, estado)

      },

  }).droppable({

     activeClass: "activo",

     hoverClass: "zona" 

  })

    //LISTA DE EMPRESAS NEGOCIACIÓN

  $(".negociacion").sortable({

    revert: "invalid",

    items: "li:not(.titulos)",

     receive: function(ev, ui)

      {

        var id = ui.item.attr('id')

        var name = ui.item.attr('name')

        var estado = 5;

        estado_crm(id, name, estado)          

      },

  }).droppable({

     activeClass: "activo",

     hoverClass: "zona" 

  })

})

async function estado_crm(organizacion_id, nombre, estado_id){

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

    const {value: nota} = await swal({

      //value captura la nota que el usuario escribe al arrastrar el elementos y cambiarlo de estado

      title: 'Cambiar de estado a '+nombre+'',

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

      },

    })

      if (nota) {

       var csrf_token = $('meta[name="csrf-token"]').attr('content')

        $.ajax({

        url:  "/cambiar_estado/"+organizacion_id+"",

        type: 'POST',

        datatype: "json",

        data: {'_token' : csrf_token, 'estado_id': estado, 'nota': nota},

            success:function(data){

                $('#organizaciones').DataTable().ajax.reload()

                $("li[id='"+organizacion_id+"']").children().children().children().remove()

                //Se comprueba si la clase del ul es negociación, se agrega un botón para finalizar el ciclo de la empresa en el panel crm

                if ($("li[name='"+nombre+"']").parent().hasClass('negociacion')){

                  $("li[id='"+organizacion_id+"']").children().children(".estado").append("<i class='material-icons text-primary' style='font-size: 17px;'>send</i> <i class='material-icons text-success' style='font-size: 17px;'>check_circle</i> <i class='material-icons text-danger' style='font-size: 17px;'>close</i>")

                }else{

                  $("li[id='"+organizacion_id+"']").children().children(".estado").append("<i class='material-icons text-success' style='font-size: 17px;'>check_circle</i> <i class='material-icons text-danger' style='font-size: 17px;'>close</i>")

                }

                //fin de la comprobación

                $.notify({icon: "add_alert", message: "la Empresa "+nombre+" ha cambiado de estado!"},{type: 'success', timer: 1000})
            
            },

            error:function(){

                //$(elemento).siblings('input').prop('checked', !checked)

                alert('la operación falló')

            }

        })

      }else{

        $( ".prospecto" ).sortable( "cancel" )

        $( ".contacto" ).sortable( "cancel" )

        $( ".reunion" ).sortable( "cancel" )

        $( ".propuesta" ).sortable( "cancel" )

        $( ".negociacion" ).sortable( "cancel" )

        $(".negociacion").attr('name', 'negociacion').append("")

      }   
}

