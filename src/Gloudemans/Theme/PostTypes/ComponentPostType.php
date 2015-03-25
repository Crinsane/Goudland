<?php namespace Gloudemans\Theme\PostTypes;

class ComponentPostType {

	/**
	 * Register the component posttype and the taxonomies
	 */
	public function __construct()
	{
		$this->registerPostType();
//		$this->registerTypeTaxonomy();
//		$this->registerDepartmentTaxonomy();
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
			'name'               => 'Onderdelen',
			'singular_name'      => 'Onderdeel',
			'menu_name'          => 'Onderdelen',
			'name_admin_bar'     => 'Onderdeel',
			'add_new'            => 'Nieuw onderdeel',
			'add_new_item'       => 'Nieuw onderdeel toevoegen',
			'new_item'           => 'Nieuw onderdeel',
			'edit_item'          => 'Wijzig onderdeel',
			'view_item'          => 'Bekijk onderdeel',
			'all_items'          => 'Alle onderdelen',
			'search_items'       => 'Zoek onderdeel',
			'parent_item_colon'  => 'Parent onderdeel:',
			'not_found'          => 'Geen onderdelen gevonden.',
			'not_found_in_trash' => 'Geen onderdelen gevonden in prullenbak.'
		];

		$args = [
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => ['slug' => 'component'],
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => ['title', 'editor', 'thumbnail', 'excerpt']
		];

		register_post_type('component', $args);
	}

	/**
	 * Register the type taxonomy
	 */
	protected function registerTypeTaxonomy()
	{
		$labels = [
			'name'              => 'Onderdeel soorten',
			'singular_name'     => 'Onderdeel soort',
			'search_items'      => 'Zoek soort',
			'all_items'         => 'Alle soorten',
			'parent_item'       => 'Parent soort',
			'parent_item_colon' => 'Parent soort:',
			'edit_item'         => 'Wijzig soort',
			'update_item'       => 'Update soort',
			'add_new_item'      => 'Voeg nieuwe soort toe',
			'new_item_name'     => 'Nieuwe soort naam',
			'menu_name'         => 'Onderdeel soorten',
		];

		$args = [
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => ['slug' => 'products/type'],
		];

		register_taxonomy('product-type', ['product'], $args);
	}

	/**
	 * Register the department taxonomy
	 */
	protected function registerDepartmentTaxonomy()
	{
		$labels = [
			'name'              => 'Product afdelingen',
			'singular_name'     => 'Product afdeling',
			'search_items'      => 'Zoek afdeling',
			'all_items'         => 'Alle afdelingen',
			'parent_item'       => 'Parent afdeling',
			'parent_item_colon' => 'Parent afdeling:',
			'edit_item'         => 'Wijzig afdeling',
			'update_item'       => 'Update afdeling',
			'add_new_item'      => 'Voeg nieuwe afdeling toe',
			'new_item_name'     => 'Nieuwe afdeling naam',
			'menu_name'         => 'Product afdelingen',
		];

		$args = [
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => ['slug' => 'components/department'],
		];

		register_taxonomy('compontent-department', ['compontent'], $args);
	}

	/**
	 * Register the category taxonomy
	 */
	protected function registerCategoryTaxonomy()
	{
		$labels = [
			'name'              => 'Onderdeel categorie&euml;n',
			'singular_name'     => 'Onderdeel categorie',
			'search_items'      => 'Zoek categorie',
			'all_items'         => 'Alle categorie&euml;n',
			'parent_item'       => 'Parent categorie',
			'parent_item_colon' => 'Parent categorie:',
			'edit_item'         => 'Wijzig categorie',
			'update_item'       => 'Update categorie',
			'add_new_item'      => 'Voeg nieuwe categorie toe',
			'new_item_name'     => 'Nieuwe categorie naam',
			'menu_name'         => 'Onderdeel categorie&euml;n',
		];

		$args = [
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => ['slug' => 'components/category'],
		];

		register_taxonomy('component-category', ['component'], $args);
	}

	/**
	 * Register the tags taxonomy
	 */
	protected function registerTagsTaxonomy()
	{
		$labels = [
			'name'              => 'Onderdeel tags',
			'singular_name'     => 'Onderdeel tag',
			'search_items'      => 'Zoek tag',
			'all_items'         => 'Alle tags',
			'parent_item'       => 'Parent tag',
			'parent_item_colon' => 'Parent tag:',
			'edit_item'         => 'Wijzig tag',
			'update_item'       => 'Update tag',
			'add_new_item'      => 'Voeg nieuwe tag toe',
			'new_item_name'     => 'Nieuwe tag naam',
			'menu_name'         => 'Onderdeel tags',
		];

		$args = [
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => ['slug' => 'components/tag'],
		];

		register_taxonomy('component-tags', ['component'], $args);
	}

	/**
	 * Register the color taxonomy
	 */
	protected function registerColorTaxonomy()
	{
		$labels = [
			'name'              => 'Onderdeel kleuren',
			'singular_name'     => 'Onderdeel kleur',
			'search_items'      => 'Zoek kleur',
			'all_items'         => 'Alle kleuren',
			'parent_item'       => 'Parent kleur',
			'parent_item_colon' => 'Parent kleur:',
			'edit_item'         => 'Wijzig kleur',
			'update_item'       => 'Update kleur',
			'add_new_item'      => 'Voeg nieuwe kleur toe',
			'new_item_name'     => 'Nieuwe kleur naam',
			'menu_name'         => 'Onderdeel kleuren',
		];

		$args = [
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => ['slug' => 'components/color'],
		];

		register_taxonomy('component-color', ['component'], $args);
	}

}