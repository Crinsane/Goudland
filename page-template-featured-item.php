<div class="featured-item">
	<div class="container">

        <?php
        $lastPost = new WP_Query([
            'post_type' => ['post'],
            'posts_per_page' => 1,
            'orderby' => 'date',
            'order' => 'DESC'
        ]);

        if($lastPost->have_posts()) : while($lastPost->have_posts()) : $lastPost->the_post();?>

            <div class="row">
                <div class="col-md-6">
                    <h1><?php the_title(); ?></h1>
                    <p><?php the_excerpt();?></p>
                </div>
                <div class="col-md-6">
                    <?php if (has_post_thumbnail()) :?>
                        <img src="<?php the_post_thumbnail_url('featured-item');?>" alt="<?php the_title();?>" class="featured-item-image">
                    <?php endif;?>
                </div>
            </div>

        <?php endwhile; endif; wp_reset_postdata();?>
	</div>
</div>