<?php

/**
 * Start the session
 */
session_start();

/**
 * Include Composer autoloader
 */
require_once __DIR__ . '/vendor/autoload.php';

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
