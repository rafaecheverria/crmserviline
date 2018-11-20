 $(function() 
		{
      $( "#catalog a" ).draggable({//propiedades 
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
       // items: "a:not(.placeholder)",
        sort: function() {

        }
      });
    });