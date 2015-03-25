<?php namespace Gloudemans\Theme\Widgets;

use WP_Widget;

class Social_Media_Widget extends WP_Widget {

	/**
	 * The available social media websites
	 *
	 * @var array
	 */
	protected $socialMedia = [
		'facebook' => 'facebook',
		'twitter' => 'twitter',
		'pinterest' => 'pinterest',
		'google' => 'google',
		'tumblr' => 'tumblr',
		'flickr' => 'flickr',
		'instagram' => 'instagram',
		'github' => 'github',
		'bitbucket' => 'bitbucket',
		'vimeo' => 'vimeo-square',
		'youtube' => 'youtube'
	];

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{
		$params = [
			'name' => 'Social Media Links',
			'classname' => 'social-widget',
			'description' => 'Toon een lijst van social media links.'
		];

		parent::__construct('Social_Media_Widget', '', $params);
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

		$i = 5;
		$options = get_option('options_social_media');
		?>

		<div class="row social-icons">
			<?php foreach($this->socialMedia as $type => $icon) :?>
				<div class="col-sm-2 social-icon <?php echo $i++ % 5 == 0 ? 'col-sm-offset-1' : '';?>">
					<a href="<?php echo $options[$type];?>"><i class="fa fa-<?php echo $icon;?>"></i></a>
				</div>
			<?php endforeach;?>

			<?php if($instance['rss']) :?>
				<div class="col-sm-2 social-icon<?php echo $i++ % 5 == 0 ? 'col-sm-offset-1' : '';?>">
					<a href="<?php bloginfo('rss2_url');?>"><i class="fa fa-rss"></i></a>
				</div>
			<?php endif;?>
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
				<input
					type="checkbox"
					id="<?php echo $this->get_field_id('rss');?>"
					name="<?php echo $this->get_field_name('rss');?>"
					value="1" <?php checked($rss); ?>
				>
				<label for="<?php echo $this->get_field_id('rss');?>">RSS icoon weergeven?</label>
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