<?php namespace Gloudemans\Theme\Widgets;

use WP_Widget;

class Accordion_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{
		$params = [
			'name' => 'Accordion lijst',
			'classname' => 'accordion-widget',
			'description' => 'Laat maximaal vier tabbladen zien met eigen invulling, weergegeven als "accordion".'
		];

		parent::__construct('Accordion_Widget', '', $params);

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
		echo $args['before_widget'];
		echo $args['before_title'] . $instance['title'] . $args['after_title'];

		$uniqueId = $args['id'] . '-' . $args['widget_id'];

		?>
			<div class="panel-group accordion-group" id="<?php echo $uniqueId;?>">
				<?php for($i = 1; $i <= 4; $i++) :?>
					<?php if( ! empty($instance['block-' . $i . '-title'])) :?>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#<?php echo $uniqueId;?>" href="#<?php echo $uniqueId;?><?php echo $i;?>">
										<?php echo $instance['block-' . $i . '-title'];?> <span class="icon pull-right <?php if($i == 1) { echo 'active'; }?>"><i class="fa <?php echo $i == 1 ? 'fa-minus' : 'fa-plus';?>"></i></span>
									</a>
								</h4>
							</div>
							<div id="<?php echo $uniqueId;?><?php echo $i;?>" class="panel-collapse collapse <?php if($i == 1) { echo 'in'; }?>">
								<div class="panel-body">
									<?php echo $instance['block-' . $i . '-content'];?>
								</div>
							</div>
						</div>
					<?php endif;?>
				<?php endfor;?>
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
		?>
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
		<?php
			for($i = 1; $i <= 4; $i++) :
		?>
			<hr>
			<p>
				<label for="<?php echo $this->get_field_id('block-' . $i . '-title');?>">Blok <?php echo $i;?> - Titel:</label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id('block-' . $i . '-title');?>"
					name="<?php echo $this->get_field_name('block-' . $i . '-title');?>"
					value="<?php echo (isset($instance['block-' . $i . '-title'])) ? esc_attr($instance['block-' . $i . '-title']) : '';?>"
					>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('block-' . $i . '-content');?>">Blok <?php echo $i;?> - Inhoud:</label>
				<textarea
					class="widefat"
					id="<?php echo $this->get_field_id('block-' . $i . '-content');?>"
					name="<?php echo $this->get_field_name('block-' . $i . '-content');?>"
				    rows="4"
				><?php echo (isset($instance['block-' . $i . '-content'])) ? esc_attr($instance['block-' . $i . '-content']) : '';?></textarea>
			</p>
		<?php
			endfor;
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
		wp_register_script('accordion-widget', get_template_directory_uri() . '/assets/js/accordion-widget.js', ['jquery'], false, true);
		wp_enqueue_script('accordion-widget');
	}

}