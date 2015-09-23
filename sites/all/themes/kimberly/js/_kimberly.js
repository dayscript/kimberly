/* Implement customer javascript here */

/* Implement customer javascript here */



(function ($) {
		$(document).ready(function() {	
			$('.reveal-modal').foundation('reveal', 'open');
			
			$('a.close-reveal-modal').on('click', function() {
  				$('.reveal-modal').css('display','none');
 			 	$('reveal-modal-bg').css('display','none');
 			}); 
		});

}); 

})(jQuery);     