<?php namespace Gloudemans\Theme\Widgets;

use WP_Widget;

class Recent_Popular_Posts_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{
		$params = [
			'name' => 'Recente &amp; populaire berichten',
			'classname' => 'recent-popular-posts-widget',
			'description' => 'Twee tabbladen, &eacute;&eacute;n met de meest recente berichten en &eacute;&eacute;n met de meest populaire berichten.'
		];

		parent::__construct('Recent_Popular_Posts_Widget', '', $params);
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
		add_filter('excerpt_length', [$this, 'changeExcerptLength']);

		echo $args['before_widget'];
		echo $args['before_title'] . $instance['title'] . $args['after_title'];

		?>
			<ul class="nav nav-tabs nav-justified" role="tablist">
				<li <?php if($instance['initial_active'] == 'recent') echo 'class="active"';?>><a href="#recent" role="tab" data-toggle="tab">Recentste</a></li>
				<li <?php if($instance['initial_active'] == 'popular') echo 'class="active"';?>><a href="#popular" role="tab" data-toggle="tab">Populairste</a></li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane <?php if($instance['initial_active'] == 'recent') echo 'active';?>" id="recent">
		<?php
			$this->generateRecentPostsTab($instance);
		?>
				</div>
				<div class="tab-pane <?php if($instance['initial_active'] == 'popular') echo 'active';?>" id="popular">
		<?php
			$this->generatePopularPostsTab($instance);
		?>
				</div>
			</div>
		<?php

		echo $args['after_widget'];

		remove_filter('excerpt_length', [$this, 'changeExcerptLength']);
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
				<label for="<?php echo $this->get_field_id('initial_active');?>">Actief tabblad?</label>
				<select id="<?php echo $this->get_field_id('initial_active');?>" name="<?php echo $this->get_field_name('initial_active');?>">
					<option value="recent" <?php selected($instance['initial_active'], 'recent');?>>Recentste</option>
					<option value="popular" <?php selected($instance['initial_active'], 'popular');?>>Populairste</option>
				</select>
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
					<?php checked($instance['show_excerpt']);?>
					id="<?php echo $this->get_field_id('show_excerpt');?>"
					name="<?php echo $this->get_field_name('show_excerpt');?>"
					value="1"
					>
				<label for="<?php echo $this->get_field_id('show_excerpt');?>">Excerpt weergeven?</label>
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
	 * Change the length of the excerpt only for this widget
	 *
	 * @param  int  $length
	 * @return int
	 */
	public function changeExcerptLength($length)
	{
		return 10;
	}

	/**
	 * @param $instance
	 * @return int
	 */
	protected function generateRecentPostsTab($instance)
	{
		$recentPosts = new WP_Query([
			'posts_per_page'      => $instance['count'],
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'post_type'           => ['post'],
			'ignore_sticky_posts' => true
		]);

		$this->postsLoop($instance, $recentPosts);

		wp_reset_postdata();
	}

	/**
	 * @param $instance
	 */
	protected function generatePopularPostsTab($instance)
	{
		$postViews = get_option('post_view_count');
		arsort($postViews);

		$popularPosts = new WP_Query([
			'posts_per_page'      => $instance['count'],
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'post_type'           => ['post'],
			'ignore_sticky_posts' => true,
			'post__in'            => array_keys($postViews),
			'orderby'             => 'post__in'
		]);

		$this->postsLoop($instance, $popularPosts);
	}

	/**
	 * @param  array     $instance
	 * @param  WP_Query  $posts
	 */
	protected function postsLoop($instance, $posts)
	{
		$first = 1;

		if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post();
		?>
			<?php if($first ++ != 1) : ?>
				<hr>
			<?php endif; ?>
			<div class="recent-popular-post">
				<?php if($instance['show_thumbnail']) : ?>
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('recent-popular-posts-widget-thumbnail', ['alt' => get_the_title()]); ?>
					</a>
				<?php endif; ?>
				<h4 class="recent-popular-post-title">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h4>
				<?php if($instance['show_date']) : ?>
					<h6 class="recent-popular-post-meta"><?php the_time('d F Y'); ?></h6>
				<?php endif; ?>
				<?php if($instance['show_excerpt']) :?>
					<p><?php the_excerpt(); ?></p>
				<?php endif;?>
			</div>
		<?php
		endwhile; endif; wp_reset_postdata();
	}
}