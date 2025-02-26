( function($) {
	$(document).ready(function () {
		$('.products-slider').slick({
			arrows: true,
			dots: false,
			infinite: true,
			speed: 300,
			slidesToShow: 4,
			slidesToScroll: 1,
			variableWidth: false,
			responsive: [
				{
					breakpoint: 992,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1,
					}
				},
				{
					breakpoint: 768,
					settings: {
						arrows: false,
						slidesToShow: 2,
						slidesToScroll: 1
					}
				}
			]
		});
	});
} )( jQuery )
