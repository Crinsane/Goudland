<?php
/*
Template Name: Contact pagina
*/
?>
<?php get_header();?>

<?php get_template_part('page-template', 'header');?>

<div class="site-page contact-page">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php
					$contactOptions = get_option('contact-options');
					$googleMaps = $contactOptions['contact-maps'];
				?>
				<iframe class="google-map" src="<?php echo $googleMaps;?>" frameborder="0"></iframe>
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