jQuery(document).ready(function($) {
	$('.btnSub').click(function(event) {
		event.preventDefault();
		if (!$(this).hasClass('btnSub_active')) {
			$(this).addClass('btnSub_active');
			$(this).children('.btnSub__name').children('.btnSub__name_name').text('Вы подписаны');
			$(this).children('.btnSub__name').children('.btnSub__name_plus').addClass('icon-fa-checked-opa');
		}
		else{
			$(this).removeClass('btnSub_active');
			$(this).children('.btnSub__name').children('.btnSub__name_name').text('Подписаться');
			$(this).children('.btnSub__name').children('.btnSub__name_plus').removeClass('icon-fa-checked-opa');
		}
	});
});