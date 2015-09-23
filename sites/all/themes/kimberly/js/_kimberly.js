
(function ($) {


	  Drupal.behaviors.cirec = {
        attach: function(context, settings){

            // Scroll al hacer click en el enlace de contacto
            $('.reveal-modal').foundation('reveal', 'open');
        	
        	$('.close-reveal-modal').on('click', function() {
  				$('.reveal-modal').foundation('reveal', 'close');
			});    
        
        }
   };


})(jQuery);     