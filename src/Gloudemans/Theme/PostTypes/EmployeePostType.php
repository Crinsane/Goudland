<?php namespace Gloudemans\Theme\PostTypes;

class EmployeePostType {

	/**
	 * Register the brand posttype
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
			'public'             => false,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => false,
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => null,
			'exclude_from_search' => true,
			'show_in_nav_menus'  => false,
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
			'name'              => 'Afdelingen',
			'singular_name'     => 'Afdeling',
			'search_items'      => 'Zoek afdeling',
			'all_items'         => 'Alle afdelingen',
			'parent_item'       => 'Parent afdeling',
			'parent_item_colon' => 'Parent afdeling:',
			'edit_item'         => 'Wijzig afdeling',
			'update_item'       => 'Update afdeling',
			'add_new_item'      => 'Voeg nieuwe afdeling toe',
			'new_item_name'     => 'Nieuwe afdeling naam',
			'menu_name'         => 'Afdelingen',
		];

		$args = [
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => ['slug' => 'afdeling'],
		];

		register_taxonomy('department', ['employee'], $args);
	}

}