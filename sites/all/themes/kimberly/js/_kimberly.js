
(function ($) {
	  Drupal.behaviors.kimberly = {
        attach: function(context, settings){

            // Scroll al hacer click en el enlace de contacto
            $('.reveal-modal').foundation('reveal', 'open');
        	
           	$('.close-reveal-modal').on('click', function() {
    		  		$('.reveal-modal').css('display', 'none');
    			   	$('.reveal-modal-bg').css('display', 'none');
              $('iframe').attr('src', 'none');
		      	}); 

            var perfil = jQuery('div.info div.perfil').html();
            if(perfil === 'Consultor'){
                var calculo = [];
                var resultado = 0;
                var total = 0;
                jQuery('td.estrellas').each(function (index){
                calculo[index] = jQuery( this ).text();
                });
                for (var i=0; i<calculo.length; i++) {
                resultado = parseInt(calculo[i].replace('.',''));
                console.log(resultado);
                total += resultado;
                }
                jQuery('#sum-full').html('Total : '+total);
                console.log(total);
                console.log('Completo..');
            } 
      }
   };
})(jQuery);     



