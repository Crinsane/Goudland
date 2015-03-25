	<?php $mainOptions = get_option('theme-options');?>
	
	<?php if($mainOptions['theme-socialmedia-footer']) get_template_part('footer', 'social-media');?>

	<?php if($mainOptions['theme-footer']) get_template_part('footer', 'main');?>

	<?php get_template_part('footer', 'bottom');?>

	<?php wp_footer();?>
</body>
</html>


