$(document).ready(function(){

  $(".prospecto").sortable({
    connectWith: [".contacto", ".reunion", ".propuesta", ".negociacion" ], 
    revert: "invalid", //crea el efecto de transición cuando se suelta el elemento
    items: "li:not(.titulos)",
    //placeholder: "sortable-placeholder",
  }).droppable({
     activeClass: "activo",
     hoverClass: "zona" 
  })


  $(".contacto").sortable({
    connectWith: [".reunion", ".propuesta", ".negociacion" ], 
    revert: "invalid",
    items: "li:not(.titulos)",
    //placeholder: "sortable-placeholder",
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

  $(".reunion").sortable({
    connectWith: [".propuesta", ".negociacion" ], 
    revert: "invalid",
    items: "li:not(.titulos)",
    placeholder: "ui-state-highlight",
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

  $(".propuesta").sortable({
    connectWith: [".negociacion" ], 
    revert: "invalid",
    items: "li:not(.titulos)",
    //placeholder: "ui-state-highlight",
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

  $(".negociacion").sortable({
    revert: "invalid",
    items: "li:not(.titulos)",
    //placeholder: "ui-state-highlight",
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
       var origen = "crm"
        $.ajax({
        url:  "/cambiar_estado/"+organizacion_id+"",
        type: 'POST',
        datatype: "json",
        data: {'_token' : csrf_token, 'estado_id': estado, 'nota': nota, 'origen': crm},
            success:function(data){
                $('#organizaciones').DataTable().ajax.reload();
                //console.log(data)
                $.notify({icon: "add_alert", message: "la Empresa "+nombre+" ha sido activada exitosamente!"},{type: 'success', timer: 1000});
            }, 
            error:function(){
                $(elemento).siblings('input').prop('checked', !checked);
                alert('la operación falló');
            }
        })
      }else{
        $( ".prospecto" ).sortable( "cancel" );
        $( ".contacto" ).sortable( "cancel" );
        $( ".reunion" ).sortable( "cancel" );
        $( ".propuesta" ).sortable( "cancel" );
        $( ".negociacion" ).sortable( "cancel" );
      }   
}
