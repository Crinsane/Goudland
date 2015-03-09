<?php

class Slider_Post_Type {

	/**
	 * Register the slide posttype and the slideshow taxonomy
	 */
	public function __construct()
	{
		$this->registerPostType();
		$this->registerTaxonomy();
	}

	/**
	 * Register the slide post type
	 */
	protected function registerPostType()
	{
		$labels = [
			'name'               => 'Slides',
			'singular_name'      => 'Slide',
			'menu_name'          => 'Slideshows',
			'name_admin_bar'     => 'Slide',
			'add_new'            => 'Nieuwe slide',
			'add_new_item'       => 'Nieuwe slide toevoegen',
			'new_item'           => 'Nieuwe slide',
			'edit_item'          => 'Wijzig slide',
			'view_item'          => 'Bekijk slide',
			'all_items'          => 'Alle slides',
			'search_items'       => 'Zoek slide',
			'parent_item_colon'  => 'Parent slide:',
			'not_found'          => 'Geen slides gevonden.',
			'not_found_in_trash' => 'Geen slides gevonden in prullenbak.'
		];

		$args = [
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => ['slug' => 'slide'],
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => ['title', 'editor', 'thumbnail']
		];

		register_post_type('slide', $args);
	}

	/**
	 * Register the slideshow taxonomy
	 */
	protected function registerTaxonomy()
	{
		$labels = [
			'name'              => 'Slideshows',
			'singular_name'     => 'Slideshow',
			'search_items'      => 'Zoek slideshow',
			'all_items'         => 'Alle slideshow',
			'parent_item'       => 'Parent slideshow',
			'parent_item_colon' => 'Parent slideshow:',
			'edit_item'         => 'Wijzig slideshow',
			'update_item'       => 'Update slideshow',
			'add_new_item'      => 'Voeg nieuwe slideshow toe',
			'new_item_name'     => 'Nieuwe slideshow naam',
			'menu_name'         => 'Slideshow',
		];

		$args = [
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => ['slug' => 'slideshow'],
		];

		register_taxonomy('slideshow', ['slide'], $args);
	}

}