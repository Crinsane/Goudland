<div class="brands-carousel">
    <?php

        $brands = new WP_Query([
            'post_type' => ['brand'],
            'posts_per_page' => -1,
            'orderby' => 'rand',
            'meta_query' => array(
                array(
                    'key'=> 'onfront',
                    'value' => '1',
                    'type' => 'numeric',
                ),
            ),
        ]);

        if($brands->have_posts()) : while($brands->have_posts()) : $brands->the_post();
            global $dynamic_featured_image;
            $featured_images = $dynamic_featured_image->get_featured_images( );
            if($featured_images[0]['full']) :
    ?>
        <a class="brands-carousel-image" href="<?php echo get_post_meta(get_the_ID(), 'website', true);?>">
            <?php

            ?>
            <img src="<?php echo $featured_images[0]['full'];?>" style="max-height: 160px; float: left;">
        </a>
    <?php endif; endwhile; endif; wp_reset_postdata();?>

</div>