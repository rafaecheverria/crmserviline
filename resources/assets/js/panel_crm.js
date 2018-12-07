$(document).ready(function(){

  $(".prospecto").sortable({
    connectWith: [".contacto", ".reunion", ".propuesta", ".negociacion" ], 
    revert: "invalid" //crea el efecto de transición cuando se suelta el elemento
  })


  $(".contacto").sortable({
    connectWith: [".reunion", ".propuesta", ".negociacion" ], 
    revert: "invalid",
     receive: function(ev, ui)
      {

        var id = ui.item.attr('id')
        var name = ui.item.attr('name')
        var estado = 2
        estado_crm(id, name, estado)
      },
  })

  $(".reunion").sortable({
    connectWith: [".propuesta", ".negociacion" ], 
    revert: "invalid",
    active: "zona",
    hover: "activo",
     receive: function(ev, ui)
      {
        var id = ui.item.attr('id')
        var name = ui.item.attr('name')
        var estado = 3;
        estado_crm(id, name, estado)
      },
  })

  $(".propuesta").sortable({
    connectWith: [".negociacion" ], 
    revert: "invalid",
    active: "zona",
    hover: "activo",
     receive: function(ev, ui)
      {
        var id = ui.item.attr('id')
        var name = ui.item.attr('name')
        var estado = 4;
        estado_crm(id, name, estado)
      },
  })

  $(".negociacion").sortable({
    revert: "invalid",
   active: "zona",
    hover: "activo",
     receive: function(ev, ui)
      {
        var id = ui.item.attr('id')
        var name = ui.item.attr('name')
        var estado = 5;
        estado_crm(id, name, estado)
      },
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
        $.ajax({
        url:  "/cambiar_estado/"+organizacion_id+"",
        type: 'POST',
        datatype: "json",
        data: {'_token' : csrf_token, 'estado_id': estado, 'nota': nota},
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
