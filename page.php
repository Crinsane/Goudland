<?php get_header();?>

<?php get_template_part('page-template', 'header');?>

	<div class="site-page contact-page">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="panel panel-default">
						<div>
							<?php get_sidebar('page');?>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<?php if(have_posts()) : while(have_posts()) : the_post();?>
						<?php the_content();?>
					<?php endwhile; else :?>

					<?php endif;?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer();?>