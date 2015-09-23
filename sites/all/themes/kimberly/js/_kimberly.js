/* Implement customer javascript here */

/* Implement customer javascript here */



(function ($) {
		$(document).ready(function() {	
			$('.reveal-modal').foundation('reveal', 'open');
		});

jQuery('a.close-reveal-modal').on('click', function() {
  jQuery('.reveal-modal').css('display','none');
  jQuery('reveal-modal-bg').css('display','none');
 
}); 

})(jQuery);     