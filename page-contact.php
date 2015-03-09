<?php get_header();?>

<?php get_template_part('page-template', 'header');?>

<div class="site-page contact-page">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2473.7642557987747!2d5.786179364368998!3d51.68245807019638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snl!4v1410947139838" frameborder="0"></iframe>
			</div>
			<div class="col-md-6 contact-details">
				<?php get_sidebar('contact');?>
			</div>
			<div class="col-md-6">
				<?php get_template_part('contact', 'form');?>
			</div>
		</div>
	</div>
</div>

<?php get_footer();?>