<?php namespace Gloudemans\Theme\Widgets;

use WP_Widget;

class Testimonial_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{
		$params = array(
			'name' => 'Testimonials',
			'classname' => 'testimonial-widget',
			'description' => 'Toon testimonials in een sidebar'
		);

		parent::__construct('Testimonial_Widget', '', $params);
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
		$testimonial = new WP_Query([
			'post_type' => ['testimonial']
		]);

		$i = 1;
		$count = $testimonial->found_posts;
		$interval = empty($instance['interval']) ? 5000 : $instance['interval'];

		echo $args['before_widget'];
		echo $args['before_title'] . $instance['title'] . $args['after_title'];

		if($testimonial->have_posts()) :
			?>
				<div id="testimonial-widget-carousel" class="carousel slide" data-ride="carousel" data-interval="<?php echo $interval;?>">
					<ol class="carousel-indicators">
						<?php for($j = 0; $j < $count; $j++) :?>
							<li data-target="#testimonial-widget-carousel" data-slide-to="<?php echo $j;?>" <?php echo $j == 0 ? 'class="active"' : '';?>></li>
						<?php endfor;?>
					</ol>

					<div class="carousel-inner">
						<?php while($testimonial->have_posts()) : $testimonial->the_post();?>
							<div class="item <?php echo $i++ == 1 ? 'active' : '';?>">
								<div class="bubble">
									<?php the_content();?>
								</div>
								<h4><?php the_title();?></h4>
								<h6><?php echo get_post_meta(get_the_ID(), 'subtitle', true);?></h6>
							</div>
						<?php endwhile;?>
					</div>
				</div>
			<?php
		endif; wp_reset_postdata();

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
				<label for="<?php echo $this->get_field_id('interval');?>">Tijd tussen slides (ms):</label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id('interval');?>"
					name="<?php echo $this->get_field_name('interval');?>"
					value="<?php echo (isset($interval)) ? esc_attr($interval) : '';?>"
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