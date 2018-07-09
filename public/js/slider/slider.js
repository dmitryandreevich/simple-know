jQuery(document).ready(function($) {
		$('.slider').slick({
		  lazyLoad: 'ondemand',
		  slidesToShow: 5,
		  slidesToScroll: 2,
		  dots:false,
		  nextArrow: '<span class="Slider__Arrow_Right Slider__Arrow icon-fa-arrow"  aria-hidden="true"></span>',
		  prevArrow: '<span class="Slider__Arrow_Left Slider__Arrow icon-fa-arrow"  aria-hidden="true"></span>',
		  responsive: [

		    {
		      breakpoint: 1199,
		      settings: {
		        slidesToShow: 1,
		      }
		    }
		  ]
		});
});