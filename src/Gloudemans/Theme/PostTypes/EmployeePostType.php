<?php namespace Gloudemans\Theme\PostTypes;

class EmployeePostType {

	/**
	 * Register the brand posttype
	 */
	public function __construct()
	{
		$this->registerPostType();
//		$this->registerTaxonomy();
	}

	/**
	 * Register the slide post type
	 */
	protected function registerPostType()
	{
		$labels = [
			'name'               => 'Werknemers',
			'singular_name'      => 'Werknemer',
			'menu_name'          => 'Werknemers',
			'name_admin_bar'     => 'Werknemer',
			'add_new'            => 'Nieuwe werknemer',
			'add_new_item'       => 'Nieuwe werknemer toevoegen',
			'new_item'           => 'Nieuwe werknemer',
			'edit_item'          => 'Wijzig werknemer',
			'view_item'          => 'Bekijk werknemer',
			'all_items'          => 'Alle werknemers',
			'search_items'       => 'Zoek werknemer',
			'parent_item_colon'  => 'Parent werknemer:',
			'not_found'          => 'Geen werknemers gevonden.',
			'not_found_in_trash' => 'Geen werknemers gevonden in prullenbak.'
		];

		$args = [
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => ['slug' => 'werknemers'],
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => ['title', 'thumbnail']
		];

		register_post_type('employee', $args);
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