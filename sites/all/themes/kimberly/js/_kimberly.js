/* Implement customer javascript here */

/* Implement customer javascript here */



(function ($) {
		$(document).ready(function() {	
			$('.reveal-modal').foundation('reveal', 'open');
		});

$('a.close-reveal-modal').on('click', function() {
  $('#second-modal').foundation('reveal', 'close');
});
		
})(jQuery);     