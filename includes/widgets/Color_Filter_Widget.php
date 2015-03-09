<?php

class Color_Filter_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{
		$params = [
			'name' => 'Kleur Filter',
			'classname' => 'color-filter-widget',
			'description' => 'Voeg een kleur filter toe aan je shop sidebar.'
		];

		parent::__construct('Color_Filter_Widget', '', $params);
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
		echo $args['before_title'] . $instance['title'] . $args['after_title'];

		$colors = get_terms('product-color', [
			'hide_empty'        => false,
			'fields'            => 'all'
		]);

		$i = 5;

		?>
			<div class="row">
				<?php foreach($colors as $color) :?>

					<div class="col-sm-2 <?php echo $i++ % 5 == 0 ? 'col-sm-offset-1' : '';?> color-filter">
						<a href="<?php echo get_term_link($color);?>" title="<?php echo $color->name;?>" class="color-filter-block" style="background-color: <?php echo get_option('color-' . $color->term_id . '-color');?>"></a>
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
		$title = isset($instance['title']) ? $instance['title'] : null;

		?>
			<p>
				<label for="<?php echo $this->get_field_id('title');?>"><?php _e('Title');?>:</label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id('title');?>"
					name="<?php echo $this->get_field_name('title');?>"
					value="<?php echo $title;?>"
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