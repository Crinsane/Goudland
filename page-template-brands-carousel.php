<div class="brands-carousel">
    <?php

        $brands = new WP_Query([
            'post_type' => ['brand'],
            'posts_per_page' => -1
        ]);

        if($brands->have_posts()) : while($brands->have_posts()) : $brands->the_post();
    ?>
        <a class="brands-carousel-image" href="<?php the_permalink();?>">
            <?php
                global $dynamic_featured_image;
                $featured_images = $dynamic_featured_image->get_featured_images( );
            ?>
            <img src="<?php echo $featured_images[0]['full'];?>" style="max-height: 160px; float: left;">
        </a>
    <?php endwhile; endif; wp_reset_postdata();?>

</div>