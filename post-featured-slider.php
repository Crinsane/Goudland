<?php
	$postId = get_the_ID();
	$slug = get_post_meta(get_the_ID(), 'featured_slider', true);
	$slideshow = new WP_Query([
		'post_type' => ['slide'],
		'tax_query' => [
			[
				'taxonomy' => 'slideshow',
				'field'    => 'slug',
				'terms'    => $slug,
			]
		]
	]);

	$term = get_term_by('slug', $slug, 'slideshow');
	$interval = get_option('slideshow-' . $term->term_id . '-interval');
	$animation = get_option('slideshow-' . $term->term_id . '-animation') == 'fade' ? 'carousel-fade' : '';

	$first = 1;

	if($slideshow->have_posts()) :
?>
	<div id="blog-post-slider-carousel-<?php echo $postId;?>" class="carousel slide <?php echo $animation;?>" data-ride="carousel" data-interval="<?php echo $interval;?>">
		<div class="carousel-inner">
			<div class="carousel-inner">
				<?php while($slideshow->have_posts()) : $slideshow->the_post();?>
					<div class="item <?php echo $first++ == 1 ? 'active' : '';?>">
						<?php the_post_thumbnail('post-slideshow', ['alt' => get_the_title()]);?>
					</div>
				<?php endwhile;?>
			</div>
		</div>

		<a class="left carousel-control" href="#blog-post-slider-carousel-<?php echo $postId;?>" role="button" data-slide="prev">
			<i class="fa fa-chevron-left"></i>
		</a>
		<a class="right carousel-control" href="#blog-post-slider-carousel-<?php echo $postId;?>" role="button" data-slide="next">
			<i class="fa fa-chevron-right"></i>
		</a>
	</div>
<?php endif; wp_reset_postdata();?>
