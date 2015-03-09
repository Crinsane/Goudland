;(function($) {
    $(function() {

        var el;

        var insertImage = wp.media.controller.Library.extend({
            defaults :  _.defaults({
                id:        'insert-image',
                title:      'Selecteer afbeelding',
                allowLocalEdits: true,
                displaySettings: true,
                displayUserSettings: true,
                multiple : false,
                type : 'image'
            }, wp.media.controller.Library.prototype.defaults )
        });

        //var frame = wp.media({
        //    title : 'Selecteer afbeelding',
        //    multiple : false,
        //    library : { type : 'image'},
        //    button : { text : 'Selecteer' },
        //    state : 'insert-image'
        //});

        var frame = wp.media({
            button : { text : 'Selecteer' },
            state : 'insert-image',
            states : [
                new insertImage()
            ]
        });

        frame.on('close',function() {
            var selection = frame.state('insert-image').get('selection');

            //console.log(selection);
        });

        frame.on( 'select',function() {
            var state = frame.state('insert-image');
            var selection = state.get('selection');
            var imageArray = [];

            //console.log(selection);

            if ( ! selection ) return;
            ////to get right side attachment UI info, such as: size and alignments
            ////org code from /wp-includes/js/media-editor.js, arround `line 603 -- send: { ... attachment: function( props, attachment ) { ... `
            selection.each(function(attachment) {
                var display = state.display( attachment ).toJSON();
                var obj_attachment = attachment.toJSON()
                var caption = obj_attachment.caption, options, html;

                // If captions are disabled, clear the caption.
                if ( ! wp.media.view.settings.captions )
                    delete obj_attachment.caption;

                display = wp.media.string.props( display, obj_attachment );

                options = {
                    id:        obj_attachment.id,
                    post_content: obj_attachment.description,
                    post_excerpt: caption
                };

                if ( display.linkUrl )
                    options.url = display.linkUrl;

                if ( 'image' === obj_attachment.type ) {
                    html = wp.media.string.image( display );
                    _.each({
                        align: 'align',
                        size:  'image-size',
                        alt:   'image_alt'
                    }, function( option, prop ) {
                        if ( display[ prop ] )
                            options[ option ] = display[ prop ];
                    });
                } else if ( 'video' === obj_attachment.type ) {
                    html = wp.media.string.video( display, obj_attachment );
                } else if ( 'audio' === obj_attachment.type ) {
                    html = wp.media.string.audio( display, obj_attachment );
                } else {
                    html = wp.media.string.link( display );
                    options.post_title = display.title;
                }

                //attach info to attachment.attributes object
                attachment.attributes['nonce'] = wp.media.view.settings.nonce.sendToEditor;
                attachment.attributes['attachment'] = options;
                attachment.attributes['html'] = html;
                attachment.attributes['post_id'] = wp.media.view.settings.post.id;

                //do what ever you like to use it
                console.log(attachment.attributes);
                console.log(attachment.attributes['attachment']);
                console.log(attachment.attributes['html']);

                console.log(el);
                el.next().val(attachment.attributes.id);
                //el.after(attachment.attributes['html']);
            });
        });

        frame.on('open',function() {
            var selection = frame.state('insert-image').get('selection');

            //remove all the selection first
            selection.each(function(image) {
                var attachment = wp.media.attachment( image.attributes.id );
                attachment.fetch();
                selection.remove( attachment ? [ attachment ] : [] );
            });

            //add back current selection, in here let us assume you attach all the [id] to <div id="my_file_group_field">...<input type="hidden" id="file_1" .../>...<input type="hidden" id="file_2" .../>
            //el.next.each(function(){
            //    var input_id = $(this);
            //    if( input_id.val() ){
                    var imageId = el.next().val();
                    var attachment = wp.media.attachment( imageId );
                    attachment.fetch();
                    selection.add( attachment ? [ attachment ] : [] );
            //    }
            //});
        });

        $(document).on('click', '.media-setting', function(e) {
            el = $(this);

            frame.open();
        });

    });
})(jQuery);