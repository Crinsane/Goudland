;(function($) {
    $(function() {

        $('.price-filter-widget-input').slider({
            tooltip: 'hide',
            handle: 'custom'
        });

        $('.price-filter-widget-input').on('slide', function(e) {
            var widget = $(this).closest('.price-filter-widget'),
                minEl = widget.find('.min'),
                maxEl = widget.find('.max'),
                minInput = widget.find('.price-min'),
                maxInput = widget.find('.price-max'),
                min = e.value[0],
                max = e.value[1];

            minEl.text(min);
            minInput.val(min);

            maxEl.text(max);
            maxInput.val(max);
        });

    })
})(jQuery);