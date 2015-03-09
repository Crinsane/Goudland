;(function($) {
    $(function() {

        var frame = wp.media({
            title : 'Selecteer afbeeldingen',
            multiple : true,
            library : { type : 'image'},
            button : { text : 'Selecteren' }
        });

        var el;

        $(document).on('click', '.select-images', function(e) {
            el = $(this);
            frame.open();
        });

        frame.on('open',function() {
            var selection = frame.state().get('selection');
            var ids = el.parent().find('.select-images-input').val().split(',');

            ids.forEach(function(id) {
                var attachment = wp.media.attachment(id);
                attachment.fetch();
                selection.add(attachment ? [attachment] : []);
            });
        });

        frame.on('close', function() {
            var imageIds = [];

            $.each(frame.state().get('selection').models, function(index, image) {
                imageIds.push(image.id);
            });

            el.parent().find('.select-images-input').val(imageIds.join(','));
        });

    });
})(jQuery);