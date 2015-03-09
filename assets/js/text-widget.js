;(function($) {
    $(function() {

        //var availableTags = [
        //    {
        //        value: "jquery",
        //        label: "jQuery"
        //    },
        //    {
        //        value: "jquery-ui",
        //        label: "jQuery UI"
        //    },
        //    {
        //        value: "sizzlejs",
        //        label: "Sizzle JS"
        //    }
        //];
        //$( ".text-widget-readmore" ).autocomplete({
        //    source: availableTags
        //});

        var frame = wp.media({
            title : 'Selecteer afbeelding',
            multiple : false,
            library : { type : 'image'},
            button : { text : 'Selecteer' }
        });

        var el;

        $(document).on('click', '.header-image', function(e) {
            el = $(this);
            frame.open();
        });

        frame.on('open',function() {
            var selection = frame.state().get('selection');
            var id = el.parent().find('.header-image-input').val();
            var attachment = wp.media.attachment(id);
            attachment.fetch();
            selection.add(attachment ? [attachment] : []);
        });

        frame.on('close', function() {
            var imageId = frame.state().get('selection').models[0].id;

            el.parent().find('.header-image-input').val(imageId);
        });

    });
})(jQuery);