
(function ($) {


	  Drupal.behaviors.cirec = {
        attach: function(context, settings){

            // Scroll al hacer click en el enlace de contacto
            $('.reveal-modal').foundation('reveal', 'open');
            
        }
   };


})(jQuery);     