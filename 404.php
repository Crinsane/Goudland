<?php get_header();?>

<?php get_template_part('page-template', 'header');?>

<div class="site-page error-page">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<h3 class="error-page-heading">Sorry, deze pagina bestaat niet</h3>
				<p class="error-page-text">De link die je probeert te bezoeken is misschien niet geldig of verwijderd.</p>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/404.png" alt="404 - Page not found">
			</div>
			<div class="col-md-4">
				<h4 class="error-page-sub-heading">Hier zijn een aantal interessante links</h4>
				<?php
					$postViews = get_option('post_view_count');
					arsort($postViews);

					$popularPages = new WP_Query([
						'posts_per_page'      => 6,
						'no_found_rows'       => true,
						'post_status'         => 'publish',
						'post_type'           => ['page', 'post'],
						'ignore_sticky_posts' => true,
						'post__in'            => array_keys($postViews),
						'orderby'             => 'post__in'
					]);
				?>
					<ul class="read-more-list">
						<?php if($popularPages->have_posts()) : while($popularPages->have_posts()) : $popularPages->the_post();?>
							<li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
						<?php endwhile; endif; wp_reset_postdata();?>
					</ul>
			</div>
			<div class="col-md-3">
				<h4 class="error-page-sub-heading">Zoek op de site</h4>
				<p>Je kunt ook onderstaande zoekfunctie gebruiken om te vinden wat je zoekt.</p>
				<?php get_search_form();?>
			</div>
		</div>
	</div>
</div>

<?php get_footer();?>