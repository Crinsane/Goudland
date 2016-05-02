<?php namespace Gloudemans\Theme;

class RegisterPostTypes {

	/**
	 * The post types to register
	 *
	 * @var array
	 */
	protected $postTypes = [
		'SliderPostType',
		'TestimonialPostType',
//		'ProductPostType',
//		'ComponentPostType',
		'BrandPostType',
		'EmployeePostType'
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
//			require_once __DIR__ . '/posttypes/' . $postType . '.php';
			$class = 'Gloudemans\\Theme\\PostTypes\\' . $postType;
			new $class();
		}
	}

}