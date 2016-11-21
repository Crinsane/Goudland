<?php namespace Gloudemans\Theme\PostTypes;

class MachinePostType {

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
			'name'               => 'Machines',
			'singular_name'      => 'Machine',
			'menu_name'          => 'Machines',
			'name_admin_bar'     => 'Machine',
			'add_new'            => 'Nieuwe machine',
			'add_new_item'       => 'Nieuwe machine toevoegen',
			'new_item'           => 'Nieuwe machine',
			'edit_item'          => 'Wijzig machine',
			'view_item'          => 'Bekijk machine',
			'all_items'          => 'Alle machines',
			'search_items'       => 'Zoek machine',
			'parent_item_colon'  => 'Parent machine:',
			'not_found'          => 'Geen machines gevonden.',
			'not_found_in_trash' => 'Geen machines gevonden in prullenbak.'
		];

		$args = [
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => ['slug' => 'machine'],
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'exclude_from_search' => true,
			'show_in_nav_menus'  => false,
            'show_in_rest'       => true,
			'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'custom-fields'],
		];

		register_post_type('machine', $args);
	}

	/**
	 * Register the slideshow taxonomy
	 */
	protected function registerTaxonomy()
	{
		$labels = [
			'name'              => 'Merken',
			'singular_name'     => 'Merk',
			'search_items'      => 'Zoek merk',
			'all_items'         => 'Alle merken',
			'parent_item'       => 'Parent merk',
			'parent_item_colon' => 'Parent merk:',
			'edit_item'         => 'Wijzig merk',
			'update_item'       => 'Update merk',
			'add_new_item'      => 'Voeg nieuw merk toe',
			'new_item_name'     => 'Nieuw merk',
			'menu_name'         => 'Merken',
		];

		$args = [
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => ['slug' => 'machines/merk'],
            'show_in_rest'      => true,
		];

		register_taxonomy('brand', ['machine'], $args);
	}

}