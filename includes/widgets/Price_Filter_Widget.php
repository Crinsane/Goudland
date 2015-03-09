<?php

class Price_Filter_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{
		$params = [
			'name' => 'Prijs Filter',
			'classname' => 'price-filter-widget',
			'description' => 'Voeg een prijs filter toe aan je shop sidebar.'
		];

		parent::__construct('Price_Filter_Widget', '', $params);

		add_action('wp_enqueue_scripts', [$this, 'enqueueWidgetScripts']);
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
		global $post;

		$min = $instance['min'];
		$max = $instance['max'];

		$currentMin = isset($_GET['priceMin']) ? esc_attr($_GET['priceMin']) : $min;
		$currentMax = isset($_GET['priceMax']) ? esc_attr($_GET['priceMax']) : $max;

		echo $args['before_widget'];
		echo $args['before_title'] . $instance['title'] . $args['after_title'];

		?>
			<form method="get" action="<?php echo get_permalink($post->ID);?>">
				<input type="hidden" name="priceMin" class="price-min" value="<?php echo $currentMin;?>">
				<input type="hidden" name="priceMax" class="price-max" value="<?php echo $currentMax;?>">
				<div class="row">
					<div class="col-md-12">
						<input class="form-control price-filter-widget-input" type="text" value="" data-slider-min="<?php echo $min;?>" data-slider-max="<?php echo $max;?>" data-slider-step="1" data-slider-value="[<?php echo $currentMin;?>,<?php echo $currentMax;?>]">
					</div>
				</div>
				<div class="row price-filter-widget-actions">
					<div class="col-sm-4">
						<button type="submit" class="btn btn-info">Filter</button>
					</div>
					<div class="col-sm-8">
						<p class="price-filter-widget-price">Prijs: &euro;<span class="min"><?php echo $currentMin;?></span> - &euro;<span class="max"><?php echo $currentMax;?></span></p>
					</div>
				</div>
			</form>
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
		$min = isset($instance['min']) ? $instance['min'] : null;
		$max = isset($instance['max']) ? $instance['max'] : null;

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
			<p>
				<label for="<?php echo $this->get_field_id('min');?>">Minimum prijs:</label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id('min');?>"
					name="<?php echo $this->get_field_name('min');?>"
					value="<?php echo $min;?>"
					>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('max');?>">Maximum prijs:</label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id('max');?>"
					name="<?php echo $this->get_field_name('max');?>"
					value="<?php echo $max;?>"
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
	 * Enqueue the scripts on the front page
	 */
	public function enqueueWidgetScripts()
	{
		wp_register_style('bootstrap-slider-css', get_template_directory_uri() . '/assets/css/bootstrap-slider.css', ['bootstrap-css']);
		wp_enqueue_style('bootstrap-slider-css');

		wp_register_script('bootstrap-slider', get_template_directory_uri() . '/assets/js/bootstrap-slider.min.js', ['jquery', 'bootstrap'], '4.0.5', true);
		wp_register_script('price-widget', get_template_directory_uri() . '/assets/js/price-widget.js', ['jquery', 'bootstrap', 'bootstrap-slider'], false, true);

		wp_enqueue_script('bootstrap-slider');
		wp_enqueue_script('price-widget');
	}

}