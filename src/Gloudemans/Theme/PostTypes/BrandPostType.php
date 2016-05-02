<?php

namespace Gloudemans\Theme\PostTypes;

class BrandPostType {

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
			'name'               => 'Merken',
			'singular_name'      => 'Merk',
			'menu_name'          => 'Merken',
			'name_admin_bar'     => 'Merk',
			'add_new'            => 'Nieuw merk',
			'add_new_item'       => 'Nieuw merk toevoegen',
			'new_item'           => 'Nieuw merk',
			'edit_item'          => 'Wijzig merk',
			'view_item'          => 'Bekijk merk',
			'all_items'          => 'Alle merken',
			'search_items'       => 'Zoek merk',
			'parent_item_colon'  => 'Parent merk:',
			'not_found'          => 'Geen merken gevonden.',
			'not_found_in_trash' => 'Geen merken gevonden in prullenbak.'
		];

		$args = [
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => ['slug' => 'brand'],
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => ['title', 'editor', 'thumbnail']
		];

		register_post_type('brand', $args);
	}

	/**
	 * Register the slideshow taxonomy
	 */
	protected function registerTaxonomy()
	{
		$labels = [
			'name'              => 'Productgroepen',
			'singular_name'     => 'Productgroep',
			'search_items'      => 'Zoek productgroep',
			'all_items'         => 'Alle productgroep',
			'parent_item'       => 'Parent productgroep',
			'parent_item_colon' => 'Parent productgroep:',
			'edit_item'         => 'Wijzig productgroep',
			'update_item'       => 'Update productgroep',
			'add_new_item'      => 'Voeg nieuwe productgroep toe',
			'new_item_name'     => 'Nieuwe productgroep naam',
			'menu_name'         => 'Productgroep',
		];

		$args = [
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => ['slug' => 'group'],
		];

		register_taxonomy('group', ['brand'], $args);
	}

}