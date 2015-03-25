<?php namespace Gloudemans\Theme;

class RegisterWidgets {

	/**
	 * The widgets to register
	 *
	 * @var array
	 */
	protected $widgets = [
		'Accordion_Widget',
		'Category_Widget',
		'Color_Filter_Widget',
		'Contact_Info_Widget',
		'Image_Widget',
		'Price_Filter_Widget',
		'Recent_Popular_Posts_Widget',
		'Recent_Posts_Widget',
		'Search_Widget',
		'Social_Media_Widget',
		'Slideshow_Widget',
		'Testimonial_Widget',
		'Tag_Cloud_Widget',
		'Text_Widget',
		'Twitter_Widget'
	];

	/**
	 * Default widgets to unregister
	 *
	 * @var array
	 */
	protected $unregister = [
		'WP_Widget_Categories',
		'WP_Widget_Recent_Posts',
		'WP_Widget_Search',
		'WP_Widget_Tag_Cloud',
		'WP_Widget_Text'
	];

	/**
	 * Register and unregister widgets
	 */
	public function __construct()
	{
		$this->unregisterDefaultWidgets();
		$this->registerWidgets();
	}

	/**
	 * Unregister the default widgets
	 */
	protected function unregisterDefaultWidgets()
	{
		$widgets = $this->unregister;

		add_action('widgets_init', function() use ($widgets)
		{
			foreach($widgets as $widget)
			{
				unregister_widget($widget);
			}
		});
	}

	/**
	 * Register the widgets
	 */
	protected function registerWidgets()
	{
		foreach($this->widgets as $widget)
		{
			add_action('widgets_init', function() use ($widget)
			{
				register_widget('Gloudemans\\Theme\\Widgets\\' . $widget);
			});
		}
	}

}


