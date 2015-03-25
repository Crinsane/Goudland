<?php namespace Gloudemans\Theme\Widgets;

use WP_Widget;

class Slideshow_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{
		$params = array(
			'name' => 'Slideshow',
			'classname' => 'slider-widget',
			'description' => 'Toon een van je slideshows in een sidebar'
		);

		parent::__construct('Slider_Widget', '', $params);
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
		$slideshow = new WP_Query([
			'post_type' => ['slide'],
			'tax_query' => [
				[
					'taxonomy' => 'slideshow',
					'field'    => 'slug',
					'terms'    => $instance['slideshow'],
				]
			]
		]);

		$first = 1;
		$term = get_term_by('slug', $instance['slideshow'], 'slideshow');
		$defaultInterval = get_option('slideshow-' . $term->term_id . '-interval');
		$defaultAnimation = get_option('slideshow-' . $term->term_id . '-animation');

		$interval = empty($instance['interval']) ? $defaultInterval : $instance['interval'];
		$animation = empty($instance['animation']) ? $defaultAnimation : $instance['animation'];
		$animationType = $animation == 'fade' ? 'carousel-fade' : '';

		echo $args['before_widget'];
		echo $args['before_title'] . $instance['title'] . $args['after_title'];

		if($slideshow->have_posts()) :
			?>
				<div id="slider-widget-carousel" class="carousel slide <?php echo $animationType;?>" data-ride="carousel" data-interval="<?php echo $interval;?>">
					<div class="carousel-inner">
						<div class="carousel-inner">
							<?php while($slideshow->have_posts()) : $slideshow->the_post();?>
								<div class="item <?php echo $first++ == 1 ? 'active' : '';?>">
									<?php the_post_thumbnail('sidebar-slideshow', ['alt' => get_the_title()]);?>
								</div>
							<?php endwhile;?>
						</div>
					</div>

					<a class="left carousel-control" href="#slider-widget-carousel" role="button" data-slide="prev">
						<i class="fa fa-chevron-left"></i>
					</a>
					<a class="right carousel-control" href="#slider-widget-carousel" role="button" data-slide="next">
						<i class="fa fa-chevron-right"></i>
					</a>
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
				<label for="<?php echo $this->get_field_id('slideshow');?>">Slideshow slug:</label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id('slideshow');?>"
					name="<?php echo $this->get_field_name('slideshow');?>"
					value="<?php echo (isset($slideshow)) ? esc_attr($slideshow) : '';?>"
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
			<p>
				<label for="<?php echo $this->get_field_id('animation');?>">Animatie:</label>
				<select
					id="<?php echo $this->get_field_id('animation');?>"
					name="<?php echo $this->get_field_name('animation');?>"
					>
					<option <?php selected($animation, 'slide'); ?> value="slide">Slide</option>
					<option <?php selected($animation, 'fade'); ?> value="fade">Fade</option>
				</select>
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