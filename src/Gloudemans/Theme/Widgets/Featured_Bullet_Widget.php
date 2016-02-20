<?php namespace Gloudemans\Theme\Widgets;

use WP_Widget;

class Featured_Bullet_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{
		$params = [
			'name' => __('Featured Bullet'),
			'classname' => 'featured-bullet-widget',
			'description' => 'Maak een featured bullet aan.'
		];

		parent::__construct('Featured_Bullet_Widget', '', $params);
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
		echo $args['before_widget'];

		?>

			<div class="featured-bullet-icon center-block bg-info">
				<h2><i class="fa <?php echo $instance['icon'];?>"></i></h2>
			</div>
			<?php echo $args['before_title'] . $instance['title'] . $args['after_title'];?>
			<p><?php echo $instance['text'];?></p>
			<p><a href="<?php echo $instance['link'];?>" class="read-more"><?php echo $instance['button'];?></a>

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
		?>
			<p>
				<label for="<?php echo $this->get_field_id('icon');?>">Icoon:</label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id('icon');?>"
					name="<?php echo $this->get_field_name('icon');?>"
					value="<?php echo (isset($instance['icon'])) ? esc_attr($instance['icon']) : '';?>"
					>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('title');?>"><?php _e('Title');?>:</label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id('title');?>"
					name="<?php echo $this->get_field_name('title');?>"
					value="<?php echo (isset($instance['title'])) ? esc_attr($instance['title']) : '';?>"
					>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('text');?>">Tekst:</label>
					<textarea
						class="widefat"
						rows="8" cols="20"
						id="<?php echo $this->get_field_id('text');?>"
						name="<?php echo $this->get_field_name('text');?>"
						><?php echo (isset($instance['text'])) ? esc_attr($instance['text']) : '';?></textarea>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('link');?>"><?php _e('Link naar');?>:</label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id('link');?>"
					name="<?php echo $this->get_field_name('link');?>"
					value="<?php echo (isset($instance['link'])) ? esc_attr($instance['link']) : '';?>"
					>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('button');?>"><?php _e('Button tekst');?>:</label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id('button');?>"
					name="<?php echo $this->get_field_name('button');?>"
					value="<?php echo (isset($instance['button'])) ? esc_attr($instance['button']) : '';?>"
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