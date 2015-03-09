;(function($) {
    $(function() {

        $('.accordion-group .panel-title a').on('click', function() {
            var icon = $(this).find('.icon');

            if(icon.hasClass('active')) {
                icon.removeClass('active');
                icon.find('.fa').toggleClass('fa-minus fa-plus');
            } else {
                icon.addClass('active');
                icon.find('.fa').toggleClass('fa-minus fa-plus');
            }
        });

    })
})(jQuery);