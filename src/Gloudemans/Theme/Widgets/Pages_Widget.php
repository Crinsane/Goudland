<?php namespace Gloudemans\Theme\Widgets;

use WP_Widget;

class Pages_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{
		$params = [
			'name' => __('Pagina menu'),
			'classname' => 'child-pages-widget',
			'description' => __('Selecteer pagina\'s die weergegeven moeten worden als links.')
		];

		parent::__construct('Pages_Widget', '', $params);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param  array  $args
	 * @param  array  $instance
	 * @return void
	 */
	public function widget($args, $instance)
	{
		$pages = get_posts([
			'post_type' => 'page',
			'post_parent' => wp_get_post_parent_id($post->ID), //$instance['parent'],
			'post_status' => 'publish',
			'order' => 'asc'
		]);

		echo $args['before_widget'];

		if( ! empty($instance['title']))
			echo $args['before_title'] . $instance['title'] . $args['after_title'];
		?>

		<ul class="list-unstyled child-pages">
			<?php foreach($pages as $page) :?>
				<li><a href="<?=get_the_permalink($page->ID);?>"><?=$page->post_title;?></a></li>
			<?php endforeach;?>
		</ul>
		<?php

		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param  array  $instance
	 * @return void
	 */
	public function form($instance)
	{
		extract($instance);

		?>
			<p>
				<label for="<?php echo $this->get_field_id('title');?>"><?php _e('Title');?>:</label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id('title');?>"
					name="<?php echo $this->get_field_name('title');?>"
					value="<?php echo (isset($title)) ? esc_attr($title) : '';?>"
					>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('parent');?>"><?php _e('Parent pagina ID');?>:</label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id('parent');?>"
					name="<?php echo $this->get_field_name('parent');?>"
					value="<?php echo (isset($parent)) ? esc_attr($parent) : '';?>"
				>
			</p>
		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param  array  $new_instance
	 * @param  array  $old_instance
	 * @return array
	 */
	public function update($new_instance, $old_instance)
	{
		return $new_instance;
	}

}