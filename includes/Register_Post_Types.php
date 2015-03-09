<?php

class Register_Post_Types {

	/**
	 * The post types to register
	 *
	 * @var array
	 */
	protected $postTypes = [
		'Slider_Post_Type',
		'Testimonial_Post_Type',
		'Product_Post_Type'
	];

	/**
	 * Register custom post types
	 */
	public function __construct()
	{
		$this->registerPostTypes();
	}

	/**
	 * Register the post types
	 */
	protected function registerPostTypes()
	{
		foreach($this->postTypes as $postType)
		{
			require_once __DIR__ . '/posttypes/' . $postType . '.php';
			new $postType();
		}
	}

}