<?php

/**
 * Start the session
 */
session_start();

/**
 * Include libraries
 */
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
/*
			background-image: linear-gradient(45deg, #c4c4c4 25%, transparent 25%, transparent 75%, #c4c4c4 75%, #c4c4c4), linear-gradient(45deg, #c4c4c4 25%, transparent 25%, transparent 75%, #c4c4c4 75%, #c4c4c4);
			background-position: 0 0px, 10px 10px;
			background-size: 20px 20px;
			height: auto;
			max-width: 100%;
			vertical-align: top;
			width: auto;
*/
}
	</style>';
});