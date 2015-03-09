<?php

class Image_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{
		$params = [
			'name' => __('Afbeeldingen'),
			'classname' => 'image-widget',
			'description' => 'Toon een selectie afbeeldingen in de sidebar.'
		];

		parent::__construct('Image_Widget', '', $params);

		add_action('admin_enqueue_scripts', [$this, 'enqueueAdminScripts']);
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
		$imagesIds = explode(',', $instance['images']);

		echo $args['before_widget'];
		echo $args['before_title'] . $instance['title'] . $args['after_title'];

		?>
			<div class="image-widget-items">
				<?php foreach($imagesIds as $imageId) : $image = get_post($imageId);?>
					<div class="col-sm-4 image-widget-item">
						<a href="<?php echo $image->guid;?>">
							<?php echo wp_get_attachment_image($imageId, 'sidebar-image');?>
						</a>
					</div>
				<?php endforeach;?>
			</div>
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
				<label for="<?php echo $this->get_field_id('images');?>">Selecteer afbeeldingen:</label>
				<input
					type="hidden"
					class="select-images-input"
					id="<?php echo $this->get_field_id('images');?>"
					name="<?php echo $this->get_field_name('images');?>"
					value="<?php echo (isset($images)) ? esc_attr($images) : '';?>"
				>
				<input type="button" class="button select-images" value="Selecteer">
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

	/**
	 * Enqueue the styles and scripts on the admin page
	 */
	public function enqueueAdminScripts()
	{
		wp_enqueue_media();
		wp_register_script('image-widget', get_template_directory_uri() . '/assets/js/image-widget.js', ['thickbox', 'media-upload']);
		wp_enqueue_script('image-widget');
	}
}