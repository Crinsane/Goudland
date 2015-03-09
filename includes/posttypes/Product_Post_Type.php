<?php

class Product_Post_Type {

	/**
	 * Register the product posttype and the category and tags taxonomy
	 */
	public function __construct()
	{
		$this->registerPostType();
		$this->registerCategoryTaxonomy();
		$this->registerTagsTaxonomy();
		$this->registerColorTaxonomy();
	}

	/**
	 * Register the slide post type
	 */
	protected function registerPostType()
	{
		$labels = [
			'name'               => 'Producten',
			'singular_name'      => 'Product',
			'menu_name'          => 'Producten',
			'name_admin_bar'     => 'Product',
			'add_new'            => 'Nieuw product',
			'add_new_item'       => 'Nieuw product toevoegen',
			'new_item'           => 'Nieuw product',
			'edit_item'          => 'Wijzig product',
			'view_item'          => 'Bekijk product',
			'all_items'          => 'Alle producten',
			'search_items'       => 'Zoek product',
			'parent_item_colon'  => 'Parent product:',
			'not_found'          => 'Geen producten gevonden.',
			'not_found_in_trash' => 'Geen producten gevonden in prullenbak.'
		];

		$args = [
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => ['slug' => 'product'],
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => ['title', 'editor', 'thumbnail', 'excerpt']
		];

		register_post_type('product', $args);
	}

	/**
	 * Register the category taxonomy
	 */
	protected function registerCategoryTaxonomy()
	{
		$labels = [
			'name'              => 'Categorie&euml;n',
			'singular_name'     => 'Categorie',
			'search_items'      => 'Zoek categorie',
			'all_items'         => 'Alle categorie&euml;n',
			'parent_item'       => 'Parent categorie',
			'parent_item_colon' => 'Parent categorie:',
			'edit_item'         => 'Wijzig categorie',
			'update_item'       => 'Update categorie',
			'add_new_item'      => 'Voeg nieuwe categorie toe',
			'new_item_name'     => 'Nieuwe categorie naam',
			'menu_name'         => 'Categorie&euml;n',
		];

		$args = [
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => ['slug' => 'products/category'],
		];

		register_taxonomy('product-category', ['product'], $args);
	}

	/**
	 * Register the tags taxonomy
	 */
	protected function registerTagsTaxonomy()
	{
		$labels = [
			'name'              => 'Tags',
			'singular_name'     => 'Tag',
			'search_items'      => 'Zoek tag',
			'all_items'         => 'Alle tags',
			'parent_item'       => 'Parent tag',
			'parent_item_colon' => 'Parent tag:',
			'edit_item'         => 'Wijzig tag',
			'update_item'       => 'Update tag',
			'add_new_item'      => 'Voeg nieuwe tag toe',
			'new_item_name'     => 'Nieuwe tag naam',
			'menu_name'         => 'Tags',
		];

		$args = [
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => ['slug' => 'products/tag'],
		];

		register_taxonomy('product-tags', ['product'], $args);
	}

	/**
	 * Register the color taxonomy
	 */
	protected function registerColorTaxonomy()
	{
		$labels = [
			'name'              => 'Kleuren',
			'singular_name'     => 'Kleur',
			'search_items'      => 'Zoek kleur',
			'all_items'         => 'Alle kleuren',
			'parent_item'       => 'Parent kleur',
			'parent_item_colon' => 'Parent kleur:',
			'edit_item'         => 'Wijzig kleur',
			'update_item'       => 'Update kleur',
			'add_new_item'      => 'Voeg nieuwe kleur toe',
			'new_item_name'     => 'Nieuwe kleur naam',
			'menu_name'         => 'Kleuren',
		];

		$args = [
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => ['slug' => 'products/color'],
		];

		register_taxonomy('product-color', ['product'], $args);
	}

}