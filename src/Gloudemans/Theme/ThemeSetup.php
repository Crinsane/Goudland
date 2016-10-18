<?php namespace Gloudemans\Theme;

class ThemeSetup {

	public function theme()
	{
		/**
		 * Register the menus
		 */
		new \Gloudemans\Theme\ThemeMenus();

		/**
		 * Change the 'read more' link for an excerpt
		 */
		new \Gloudemans\Theme\CustomExcerpt();

		/**
		 * Register the post types
		 */
		new \Gloudemans\Theme\RegisterPostTypes();

		/**
		 * Register the widgets
		 */
		new \Gloudemans\Theme\RegisterWidgets();

		/**
		 * Add meta boxes to the posts
		 */
		new \Gloudemans\Theme\PostMetaBoxes();

		/**
		 * Add meta boxes to the employees
		 */
		new \Gloudemans\Theme\EmployeeMetaBoxes();

        new \Gloudemans\Machines\MachineMetaBoxes();

		/**
		 * Add meta boxes to the brands
		 */
		new \Gloudemans\Theme\BrandMetaBoxes();

		/**
		 * Register the sidebars
		 */
		new \Gloudemans\Theme\RegisterSidebars();

		/**
		 * Add theme support for post formats and thumbnails
		 */
		new \Gloudemans\Theme\SetupThemeSupports();

		/**
		 * Add image sizes for the slideshows
		 */
		new \Gloudemans\Theme\ImageSizes();

		/**
		 * Register and enqueue all needed styles and scripts
		 */
		new \Gloudemans\Theme\RegisterStylesScripts();

		/**
		 * Add the custom stylesheet
		 */
		new \Gloudemans\Theme\CustomStyles();

		/**
		 * Add the popular posts counter
		 */
		new \Gloudemans\Theme\PopularPosts();

		/**
		 * Handle a contact form submission
		 */
		new \Gloudemans\Theme\ContactForm();
	}

	public function settings()
	{
		/**
		 * Add the settings page
		 */
		$page = new \Gloudemans\Settings\Page();
		$page->registerSubMenuPages([
			'Gloudemans\Settings\Pages\Main',
			'Gloudemans\Settings\Pages\Frontpage',
			'Gloudemans\Settings\Pages\Company',
			'Gloudemans\Settings\Pages\Socialmedia',
			'Gloudemans\Settings\Pages\Product',
			'Gloudemans\Settings\Pages\Contact',
		]);
		$page->setup();
	}

	public function products()
	{
		/**
		 * Set the product listing type
		 */
		new \Gloudemans\Products\ProductListing();

		/**
		 * Add meta boxes to the products
		 */
        new \Gloudemans\Products\ProductMetaBoxes();

		/**
		 * Add meta fields to the color taxonomy
		 */
		new \Gloudemans\Products\ColorMetaFields();

		/**
		 * Setup product list table
		 */
		new \Gloudemans\Products\ProductListTable();
	}

	public function slideshows()
	{
		/**
		 * Add meta fields to the slideshow taxonomy
		 */
		new \Gloudemans\Slideshows\SlideshowMetaFields();
	}

	public function testimonials()
	{

		/**
		 * Add the subtitle for the testimonial subtitle
		 */
		new \Gloudemans\Testimonials\TestimonialSubtitle();
	}

}