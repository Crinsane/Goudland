<?php get_header();?>

<?php get_template_part('page-template', 'header');?>

<div class="site-page blog-single-page">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<?php get_template_part('post', 'single');?>
			</div>
			<div class="col-sm-3">
				<?php get_sidebar('blog');?>
			</div>
		</div>
	</div>
</div>

<?php get_footer();?>