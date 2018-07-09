jQuery(document).ready(function($) {
    
    var switc = $('.card__switch');
    var card = $('.myInterest__wrap');
    switc.click(function(event) {
        $(this).toggleClass('remove add');

        if (!$(this).hasClass('add')) {
            $(this).children('.card__icon').addClass('icon-fa-cross');
            $(this).children('.card__icon').removeClass('icon-fa-circlePlus');
            $(this).parents('.card').addClass('active');
        }
        else{
            $(this).children('.card__icon').removeClass('icon-fa-cross');
            $(this).children('.card__icon').addClass('icon-fa-circlePlus');
            $(this).parents('.card').removeClass('active');

            $(this).parents('.card').children('.card__list').children('.card__item').children('.card__checkbox').prop('checked', false);
        }
    });
    $('.card_add').click(function(event) {
        card.removeClass('myInterest__wrap_hidden');
        $(this).hide();
    });




});



(function($) {
    $.fn.textfill = function(options) {
        var fontSize = options.maxFontPixels;
        var ourText = $('span:visible:first', this);
        var maxHeight = $(this).height();
        var maxWidth = $(this).width();
        var textHeight;
        var textWidth;
        do {
            ourText.css('font-size', fontSize);
            textHeight = ourText.height();
            textWidth = ourText.width();
            fontSize = fontSize - 1;
        } while ((textHeight > maxHeight || textWidth > maxWidth) && fontSize > 3);
        return this;
    }
})(jQuery);
 
$(document).ready(function() {
    var elem1 = $(".card__name");
    var elemsTotal = elem1.length;
    for(var i=0; i<elemsTotal; ++i){
        $(elem1[i]).textfill({ maxFontPixels: 35 });
    }


});