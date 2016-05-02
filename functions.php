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
$setup->products();
$setup->slideshows();
$setup->testimonials();

add_action('admin_head', function () {
    echo '<style>
		#dfiFeaturedMetaBox-2 .inside img {
			background: #414141;
        }
	</style>';
});