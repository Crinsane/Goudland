<?php namespace Gloudemans\Theme\Widgets;

use WP_Widget;

class Text_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{
		$params = [
			'name' => __('Text'),
			'classname' => 'text-widget',
			'description' => __('Arbitrary text or HTML.')
		];

		$formOptions = ['width' => 400, 'height' => 350];

		parent::__construct('Text_Widget', '', $params, $formOptions);

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
		echo $args['before_widget'];

		if( ! empty($instance['title'])) {
			echo $args['before_title'];
			echo $instance['title'];
			if( ! empty($instance['subtitle'])) {
				echo ' <small>'.$instance['subtitle'].'</small>';
			}
			echo $args['after_title'];
		}
		?>
			<?php echo wp_get_attachment_image($instance['image'], 'text-widget-image', false, ['class' => 'text-widget-image']);?>
			<?php echo ($instance['paragraphs']) ? wpautop($instance['text']) : $instance['text'];?>
			<?php if( ! empty($instance['readmore'])) :?>
				<p><a href="<?php echo $instance['readmore'];?>" class="read-more">Lees meer</a></p>
			<?php endif;?>
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
				<label for="<?php echo $this->get_field_id('subtitle');?>"><?php _e('Subtitel');?>:</label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id('subtitle');?>"
					name="<?php echo $this->get_field_name('subtitle');?>"
					value="<?php echo (isset($subtitle)) ? esc_attr($subtitle) : '';?>"
				>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('image');?>">Header afbeelding:</label>
				<input
					type="hidden"
					class="header-image-input"
					id="<?php echo $this->get_field_id('image');?>"
					name="<?php echo $this->get_field_name('image');?>"
					value="<?php echo (isset($image)) ? esc_attr($image) : '';?>"
					>
				<input type="button" class="button header-image" value="Selecteer">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('text');?>">Tekst:</label>
				<textarea
					class="widefat"
					rows="16" cols="20"
					id="<?php echo $this->get_field_id('text');?>"
					name="<?php echo $this->get_field_name('text');?>"
				><?php echo (isset($text)) ? esc_attr($text) : '';?></textarea>
			</p>
			<p>
				<input
					type="checkbox"
					class="checkbox"
					<?php checked($instance['paragraphs']);?>
					id="<?php echo $this->get_field_id('paragraphs');?>"
					name="<?php echo $this->get_field_name('paragraphs');?>"
					value="1"
					>
				<label for="<?php echo $this->get_field_id('paragraphs');?>"><?php _e('Automatically add paragraphs');?></label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('readmore');?>">Lees meer:</label>
				<input
					type="text"
					class="widefat text-widget-readmore"
					id="<?php echo $this->get_field_id('readmore');?>"
					name="<?php echo $this->get_field_name('readmore');?>"
					value="<?php echo (isset($readmore)) ? esc_attr($readmore) : '';?>"
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

	/**
	 * Enqueue the styles and scripts on the admin page
	 */
	public function enqueueAdminScripts()
	{
		wp_enqueue_media();
		wp_enqueue_script('jquery-ui-autocomplete');
		wp_enqueue_script('text-widget', get_template_directory_uri() . '/assets/js/text-widget.js', ['thickbox', 'media-upload']);
	}

}