jQuery(document).ready(function($) {



	// search
	$('.Search__input').on('input', function () { 
		var test = $('.search_test');
		var text = $(this).val();
		test = test.text(text);
		var wi = test.outerWidth();
		$(this).width(wi);
	 	if (text.length <= 0) {
	  		$(this).width(155);
	  	}
	});



	setTimeout(function() {
	 	  $('select').styler();
	}, 100)


});