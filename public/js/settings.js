jQuery(document).ready(function($) {
	var click = $('.profile__mail_icon');
	var input = $('.profile__input');
	var box = $('.profile__mail_corrent');

	click.click(function(event) {
		$(this).hide();
		input.removeAttr('disabled').focus();
		input.bind( 'blur',function(event) {
			click.show();
			$(this).attr('disabled','');
		});
		
	});



	// focus
   	var label_foc = $('.inputArea__input,.inputArea__textarea');
   	label_foc.focus(function(event) {
		$(this).addClass('active');
 	});
    label_foc.change(function(event) {
   		if ($(this).val() != '') {
   			$(this).addClass('active');
   		}
   		else{
   			$(this).removeClass('active');
   		}
   	});
 	label_foc.blur(function(event) {
		if ($(this).val() != '') {
   			$(this).addClass('active');
   		}
   		else{
   			$(this).removeClass('active');
   		}
 	});
 	// score
 	$('.inputArea__textarea').on('input', function () { 
		var len = $(this).val().length;
		$('.inputArea__score > span').text(len);
	});
		
});