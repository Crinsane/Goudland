<?php get_header();?>

<?php $frontPageOptions = get_option('frontpage-options');?>

<?php if($frontPageOptions['show-slideshow']) get_template_part('page-template', 'slider');?>

<?php if($frontPageOptions['show-featured-bullets']) get_template_part('page-template', 'featured-bullets');?>

<?php if($frontPageOptions['show-carousel']) get_template_part('page-template', 'continuous-carousel');?>

<?php if($frontPageOptions['show-featured-item']) get_template_part('page-template', 'featured-item');?>

<?php get_footer();?>