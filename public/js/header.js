jQuery(document).ready(function($) {
	var navBar = $('.burger');
	var header = $('.header');
	
	navBar.on('click', function(event) {
		event.preventDefault();
		header.addClass('header_active');


		var firstClick = true;
		$('body').bind('click', function(e) {
			if (!firstClick && $(e.target).closest('.header__navigation').length == 0) {
				// Удаляем класс active
				header.removeClass('header_active');
				$('body').unbind('click');
			}
			firstClick = false;
		});
	});
});