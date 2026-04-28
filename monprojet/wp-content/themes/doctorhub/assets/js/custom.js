jQuery(function($) {
	$('.doctors-carousel').owlCarousel({
		loop: true,
		margin: 10,
		rtl: $("html").attr("dir") == 'rtl' ? true : false,
		autoplay: true,
		responsive: {
			0: {
				items: 1,
				nav: false
			},
			600: {
				items: 2
			},
			991: {
				items: 3,				
				nav: true
			},
			1199: {
				items: 4,
			}

		}
	})
    // -------------- End
});