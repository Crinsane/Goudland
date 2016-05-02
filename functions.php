<?php

/**
 * Start the session
 */
session_start();

/**
 * Include libraries
 */
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/lib/TwitterAPIExchange.php';
require_once __DIR__ . '/lib/color.php';

/**
 * Remove the WP meta tag
 */
remove_action('wp_head', 'wp_generator');

/**
 * Setup the theme
 */
$setup = new \Gloudemans\Theme\ThemeSetup();
$setup->theme();
$setup->settings();
//$setup->products();
$setup->slideshows();
$setup->testimonials();

add_action('admin_head', function () {
    echo '<style>
		#dfiFeaturedMetaBox-2 .inside img {
			background: #414141;
        }
	</style>';
});

add_filter('manage_brand_posts_columns', function ($columns) {
        $front = array_slice($columns, 0, 2);
		$end = array_slice($columns, 2);
		$new = ['website' => 'Website', 'onfront' => 'Op voorpagina'];

		return $front + $new + $end;
});

add_action('manage_brand_posts_custom_column', function ($column, $post_id) {
    switch ($column) {
        case 'website':
            echo get_post_meta($post_id , 'website' , true);
            break;

        case 'onfront':
            echo get_post_meta($post_id , 'onfront' , true) == 1 ? 'Ja' : '';
            break;
    }
}, 10, 2 );