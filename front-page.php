<?php get_header();?>

<?php if(get_theme_mod('show_slideshow')) get_template_part('page-template', 'slider');?>

<?php if(get_theme_mod('show_featured_bullets')) get_template_part('page-template', 'featured-bullets');?>

<?php if(get_theme_mod('show_carousel')) get_template_part('page-template', 'continuous-carousel');?>

<?php if(get_theme_mod('show_featured_item')) get_template_part('page-template', 'featured-item');?>

<?php get_footer();?>