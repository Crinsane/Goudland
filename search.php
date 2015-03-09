<?php get_header();?>

<?php get_template_part('page-template', 'header');?>

	<div class="site-page blog-list-page">
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<?php echo get_template_part('search', 'results');?>
				</div>
				<div class="col-sm-3">
					<?php get_sidebar('search');?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer();?>