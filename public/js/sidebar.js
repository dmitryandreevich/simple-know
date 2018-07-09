jQuery(document).ready(function($) {
	var btnUp = $('.sidebar__up');

	$(window).on('scroll', function(event) {
		
		if ($(window).scrollTop() >= 200) {
			btnUp.fadeIn();
		}
		else {
			btnUp.fadeOut();
		}
	});

	btnUp.on('click', function(event) {
		$('html,body').animate({scrollTop:0}, 800);
	});



	

});

