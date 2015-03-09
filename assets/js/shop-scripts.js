;(function($) {
    $(function() {

        $('.products-order-by').on('change', function() {
            $('.product-list-form').submit();
        });

        $('.products-per-page').on('change', function() {
            $('.product-list-form').submit();
        });

        $('.products-order').on('click', function(e) {
            var btn = $(this),
                icon = btn.find('.fa'),
                select = $('.products-order-select');

            if(icon.hasClass('fa-arrow-up')) {
                select.val('asc');
            } else {
                select.val('desc');
            }

            $('.product-list-form').submit();
        });

        $('.products-listing-type').on('click', 'button', function() {
            var btn = $(this),
                form = $('.products-listing-type').find('form'),
                input = form.find('input');

            if(btn.hasClass('list')) {
                input.val('list');
            } else {
                input.val('grid');
            }

            form.submit();
        });

    });
})(jQuery);