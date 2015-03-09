<?php

class Testimonial_Post_Type {

	/**
	 * Register the testimonial posttype
	 */
	public function __construct()
	{
		$this->registerPostType();
	}

	/**
	 * Register the testimonial post type
	 */
	protected function registerPostType()
	{
		$labels = [
			'name'               => 'Testimonials',
			'singular_name'      => 'Testimonial',
			'menu_name'          => 'Testimonials',
			'name_admin_bar'     => 'Testimonial',
			'add_new'            => 'Nieuwe testimonial',
			'add_new_item'       => 'Nieuwe testimonial toevoegen',
			'new_item'           => 'Nieuwe testimonial',
			'edit_item'          => 'Wijzig testimonial',
			'view_item'          => 'Bekijk testimonial',
			'all_items'          => 'Alle testimonials',
			'search_items'       => 'Zoek testimonial',
			'parent_item_colon'  => 'Parent testimonial:',
			'not_found'          => 'Geen testimonials gevonden.',
			'not_found_in_trash' => 'Geen testimonials gevonden in prullenbak.'
		];

		$args = [
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => ['slug' => 'testimonial'],
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => ['title', 'editor']
		];

		register_post_type('testimonial', $args);
	}

}