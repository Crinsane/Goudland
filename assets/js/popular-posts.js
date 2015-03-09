;(function($) {
    $(function() {

        $.post(popularPosts.url, {
            action: 'popular_posts',
            postId: popularPosts.postId
        }).done(function(result) {
            //console.log(result);
        });

    })
})(jQuery);