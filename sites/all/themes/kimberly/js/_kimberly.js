
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
      }
   };


})(jQuery);     



