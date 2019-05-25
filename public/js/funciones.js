$(document).ready(function() {
	// jQuery.get('echo/authstatus', function(data) {
	// 	console.log(data);
    // });

    
    var produccion = 0 ;
    var urlsite="";



    function validateDecimal(valor) {
        var RE = /^\d*\.?\d*$/;
        if (RE.test(valor)) {
            return true;
        } else {
            return false;
        }
    }

    $('.btn-tarifa').click(function(){
        $('#nuevaTarifa').val($(this).attr('rel'))
       urlsite= $(this).attr('href');

    })
    
    $('#cambiaPrecio').click(function(){
         var nuevaTarifa =$('#nuevaTarifa').val(); 
        if(nuevaTarifa && urlsite !=""){
            jQuery.get(urlsite,{ nuevaTarifa: nuevaTarifa}, function(data) {
                location.reload();
            });
        }
        else{
            alert("ingrese un numero ")
        }

      

    })
   
        

    /* Elimianr*/
    var urlDestino
    $('.delDestino').click(function(){
        var destino= $(this).attr("rel");
        $('#delDestino').html("¿Desea eliminar el destino "+destino+ " ?")
        urlDestino =$(this).attr("href");

    })

    $('#delDestinoOK').click(function(){
        jQuery.get(urlDestino, function(data) {
           console.log(data)
            location.reload();
        });

    })

    var urlTarifa
    $('.delTarifa').click(function(){
        var tarifa= $(this).attr("rel");
        $('#delTarifas').html("¿Desea eliminar la tarifa  "+tarifa+ " ?")
        urlTarifa =$(this).attr("href");

    })

    $('#delDestinoOK').click(function(){
        jQuery.get(urlTarifa, function(data) {
           console.log(data)
            location.reload();
        });

    })

});