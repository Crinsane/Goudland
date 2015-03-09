<?php

use Gloudemans\Settings\Page;
use Gloudemans\Settings\Pages\Contact;
use Gloudemans\Settings\Pages\Frontpage;
use Gloudemans\Settings\Pages\Main;
use Gloudemans\Settings\Pages\Company;
use Gloudemans\Settings\Pages\Product;
use Gloudemans\Settings\Pages\Socialmedia;

session_start();

require_once __DIR__ . '/vendor/autoload.php';

$page = new Page();
$page->registerSubMenuPages([
	Main::class,
	Frontpage::class,
	Company::class,
	Socialmedia::class,
	Product::class,
	Contact::class
]);
$page->setup();

/**
 * Remove the WP meta tag
 */
remove_action('wp_head', 'wp_generator');

/**
 * Include the helper functions file
 */
require_once __DIR__ . '/includes/helpers.php';

/**
 * Set the product listing type
 */
require_once __DIR__ . '/includes/ProductListing.php';
new ProductListing();

/**
 * Register the menus
 */
require_once __DIR__ . '/includes/Theme_Menus.php';
new Theme_Menus();

/**
 * Change the 'read more' link for an excerpt
 */
require_once __DIR__ . '/includes/Custom_Excerpt.php';
new Custom_Excerpt();

/**
 * Include the custom walker for nav menu
 */
require_once __DIR__ . '/includes/walkers/Custom_Walker_Nav_Menu.php';

/**
 * Add the settings page
 */
//require_once __DIR__ . '/includes/settings/SettingsPage.php';
//new SettingsPage();

/**
 * Register the post types
 */
require_once __DIR__ . '/includes/Register_Post_Types.php';
new Register_Post_Types();

/**
 * Register the widgets
 */
require_once __DIR__ . '/includes/Register_Widgets.php';
new Register_Widget();

/**
 * Add the subtitle for the testimonial subtitle
 */
require_once __DIR__.'/includes/Testimonial_Subtitle.php';
new Testimonial_Subtitle();

/**
 * Add meta boxes to the posts
 */
require_once __DIR__.'/includes/Post_Meta_Boxes.php';
new Post_Meta_Boxes();

/**
 * Add meta boxes to the products
 */
require_once __DIR__.'/includes/Product_Meta_Boxes.php';
new Product_Meta_Boxes();

/**
 * Add the breadcrumbs function
 */
require_once __DIR__ . '/includes/Breadcrumbs.php';

/**
 * Register the sidebars
 */
require_once __DIR__ . '/includes/Register_Sidebars.php';
new Register_Sidebars();

/**
 * Add theme support for post formats and thumbnails
 */
require_once __DIR__ . '/includes/SetupThemeSupports.php';
new SetupThemeSupports();

/**
 * Add image sizes for the slideshows
 */
require_once __DIR__ . '/includes/Image_Sizes.php';
new Image_Sizes();

/**
 * Add custom options to the theme customizer
 */
require_once __DIR__.'/includes/customizer/ThemeCustomizer.php';
new ThemeCustomizer();

/**
 * Register and enqueue all needed styles and scripts
 */
require_once __DIR__ . '/includes/Register_Styles_Scripts.php';
new Register_Styles_Scripts();

/**
 * Add the custom stylesheet
 */
require_once __DIR__ . '/includes/CustomStyles.php';
new CustomStyles();

/**
 * Add meta fields to the slideshow taxonomy
 */
require_once __DIR__.'/includes/Slideshow_Meta_Fields.php';
new Slideshow_Meta_Fields();

/**
 * Add meta fields to the color taxonomy
 */
require_once __DIR__.'/includes/Color_Meta_Fields.php';
new Color_Meta_Fields();

/**
 * Add the popular posts counter
 */
require_once __DIR__.'/includes/Popular_Posts.php';
new Popular_Posts();

/**
 * Handle a contact form submission
 */
require_once __DIR__.'/includes/ContactForm.php';
new ContactForm();

require_once __DIR__ . '/includes/ProductsLoop.php';










// add new buttons
add_filter('mce_buttons', 'myplugin_register_buttons');

function myplugin_register_buttons($buttons) {
//	dd($buttons);
	foreach($buttons as $key => $value)
	{
		if($value == 'blockquote')
		{
			$buttons[$key] = 'blockquoteCite';
		}
	}
//	array_push($buttons, 'blockquoteCite');
	return $buttons;
}

// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
add_filter('mce_external_plugins', 'myplugin_register_tinymce_javascript');

function myplugin_register_tinymce_javascript($plugin_array) {
	$plugin_array['blockquoteCite'] = get_template_directory_uri() . '/assets/js/tinymce-blockquote-cite.js';
	return $plugin_array;
}

//function myplugin_tinymce_buttons($buttons)
//{
//	//Remove the text color selector
//	$remove = 'blockquote';
//
//	//Find the array key and then unset
//	if ( ( $key = array_search($remove,$buttons) ) !== false )
//		unset($buttons[$key]);
//
//	return $buttons;
//}
//add_filter('mce_buttons','myplugin_tinymce_buttons');










include __DIR__ . '/includes/dev.php';