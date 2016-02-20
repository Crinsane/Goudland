;(function($) {
	$(function() {

        //$('.contact-form').on('submit', function(e) {
        //    e.preventDefault();
        //
        //    var form = $(this),
        //        formContent = form.serializeArray();
        //
        //    validateContent(formContent);
        //});
        //
        //function validateContent(content) {
        //    $.each(content, function(key, value) {
        //       console.log(key, value);
        //    });
        //}

        $('.continuous-carousel').cycle();

		$('.brands-carousel').slick({
			slidesToShow: 6,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
			speed: 600,
			infinite: true,
			arrows: false
		});

	})
})(jQuery);