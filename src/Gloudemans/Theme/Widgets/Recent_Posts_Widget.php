<?php namespace Gloudemans\Theme\Widgets;

use WP_Widget;

class Recent_Posts_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{
		$params = array(
			'name' => __('Recent Posts'),
			'classname' => 'recent-posts-widget',
			'description' => __( "Your site&#8217;s most recent Posts.")
		);

		parent::__construct('Recent_Posts_Widget', '', $params);
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
		$posts = new WP_Query([
			'posts_per_page' => $instance['count'],
			'no_found_rows' => true,
			'post_status' => 'publish',
			'post_type' => ['post'],
			'ignore_sticky_posts' => true
		]);

		echo $args['before_widget'];
		echo $args['before_title'] . $instance['title'] . $args['after_title'];

		if($posts->have_posts()) :
			?>
				<ul class="media-list">
					<?php while($posts->have_posts()) : $posts->the_post();?>
						<li class="media">
							<?php if($instance['show_thumbnail'] && has_post_thumbnail()) :?>
								<a class="pull-left post-thumbnail" href="<?php the_permalink();?>">
									<?php the_post_thumbnail('recent-post-thumbnail', ['alt' => get_the_title()]);?>
								</a>
							<?php endif;?>
							<div class="media-body">
								<?php if( ! $instance['show_thumbnail'] || ! has_post_thumbnail()) :?>
									<a href="<?php the_permalink();?>">
										<?php the_title();?>
									</a>
								<?php else :?>
									<?php the_title();?>
								<?php endif;?>
								<?php if($instance['show_date']) :?>
									<span class="media-footer"><?php the_time('d F Y');?></span>
								<?php endif;?>
							</div>
						</li>
					<?php endwhile;?>
				</ul>
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
			<p>
				<label for="<?php echo $this->get_field_id('count');?>"><?php _e('Number of posts to show:');?></label>
				<select id="<?php echo $this->get_field_id('count');?>" name="<?php echo $this->get_field_name('count');?>">
					<?php for($i = 1; $i <= 10; ++$i) :?>
						<option value="<?php echo $i;?>" <?php selected($instance['count'], $i);?>><?php echo $i;?></option>
					<?php endfor;?>
				</select>
			</p>
			<p>
				<input
					type="checkbox"
					class="checkbox"
					<?php checked($instance['show_date']);?>
					id="<?php echo $this->get_field_id('show_date');?>"
					name="<?php echo $this->get_field_name('show_date');?>"
				    value="1"
				>
				<label for="<?php echo $this->get_field_id('show_date');?>"><?php _e('Display post date?');?></label>
			</p>
			<p>
				<input
					type="checkbox"
					class="checkbox"
					<?php checked($instance['show_thumbnail']);?>
					id="<?php echo $this->get_field_id('show_thumbnail');?>"
					name="<?php echo $this->get_field_name('show_thumbnail');?>"
				    value="1"
				>
				<label for="<?php echo $this->get_field_id('show_thumbnail');?>">Thumbnail weergeven?</label>
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