;(function($) {
    $(function() {

        var siteHeaderLogoFrame = wp.media({
            title : 'Selecteer logo',
            multiple : false,
            library : { type : 'image'},
            button : { text : 'Selecteer' }
        });

        $('.site-header-logo').on('click', function() {
            siteHeaderLogoFrame.open();
        });

        siteHeaderLogoFrame.on('select', function() {
            var attachment = siteHeaderLogoFrame.state().get('selection').first();

            var customizeControl = wp.customize.control.instance('site_logo');
            customizeControl.thumbnailSrc(attachment.attributes.url);
            customizeControl.setting.set(attachment.attributes.url);
        });

        // ----------------------------------------------------------------------------

        var siteCarouselFrame = wp.media({
            title : 'Selecteer afbeeldingen',
            multiple : true,
            library : { type : 'image'},
            button : { text : 'Selecteer' }
        });

        $('.site-carousel').on('click', function() {
            siteCarouselFrame.open();
        });

        siteCarouselFrame.on('select', function() {
            var attachments = siteCarouselFrame.state().get('selection').models;

            //console.log(attachments);

            var customizeControl = wp.customize.control.instance('carousel_settings');

            //console.log(customizeControl);
            $.each(attachments, function(index, attachment) {
                customizeControl.thumbnailSrc(attachment.attributes.url);
                customizeControl.setting.set(attachment.attributes.url);
            });
        });

        // ----------------------------------------------------------------------------

        var showSlideshow = $('input[data-customize-setting-link=show_slideshow]');
        var slideshowSlug = $('input[data-customize-setting-link=front_page_slideshow_slug]');
        slideshowSlug.css('margin-bottom', '10px');

        if( ! showSlideshow.prop('checked')) slideshowSlug.hide();
        showSlideshow.on('change', function() {
            if($(this).prop('checked')) {
                slideshowSlug.show();
            } else {
                slideshowSlug.hide();
            }
        });

        slideshowSlug.prop('placeholder', 'Slideshow slug');

    });
})(jQuery);