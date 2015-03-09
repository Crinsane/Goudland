<?php

class Contact_Info_Widget extends WP_Widget {

	/**
	 * The available social media websites
	 *
	 * @var array
	 */
	protected $socialMedia = [
		'facebook' => 'facebook-square',
		'twitter' => 'twitter-square',
		'pinterest' => 'pinterest-square',
		'google' => 'google-plus-square',
		'tumblr' => 'tumblr-square',
		'flickr' => 'flickr',
		'instagram' => 'instagram',
		'github' => 'github-square',
		'bitbucket' => 'bitbucket-square',
		'vimeo' => 'vimeo-square',
		'youtube' => 'youtube-square'
	];

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{
		$params = [
			'name' => 'Contactinformatie',
			'classname' => 'contact-info-widget',
			'description' => 'Een widget voor het weergeven van contact informatie.'
		];

		parent::__construct('Contact_Info_Widget', '', $params);
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

		?>
			<?php if(isset($instance['before'])) :?>
				<p><?php echo $instance['before'];?></p>
			<?php endif;?>
			<address>
	            <?php if(isset($instance['name'])) :?>
					<strong><?php echo $instance['name'];?></strong><br>
				<?php endif;?>
				<?php if(isset($instance['address'])) :?>
					<?php echo $instance['address'];?><br>
				<?php endif;?>
				<?php if(isset($instance['zipcode']) || isset($instance['city'])) :?>
					<?php echo $instance['zipcode'];?> <?php echo $instance['city'];?><br>
				<?php endif;?>
				<?php if(isset($instance['country'])) :?>
					<?php echo $instance['country'];?><br>
				<?php endif;?>
				<br>
				<?php if(isset($instance['phone'])) :?>
					<i class="fa fa-phone"></i> <?php echo $instance['phone'];?><br>
				<?php endif;?>
				<?php if(isset($instance['fax'])) :?>
					<i class="fa fa-fax"></i> <?php echo $instance['fax'];?><br>
				<?php endif;?>
				<?php if(isset($instance['email'])) :?>
					<i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo $instance['email'];?>"><?php echo $instance['email'];?></a><br>
				<?php endif;?>
				<?php if(isset($instance['website'])) :?>
					<i class="fa fa-link"></i> <a href="<?php echo $instance['website'];?>"><?php echo $instance['website'];?></a>
				<?php endif;?>
			</address>

			<?php if($instance['show_social_media']) :?>
				<ul class="list-inline social-media-list">
					<?php foreach($this->socialMedia as $type => $icon) :?>
						<li><a href="<?php echo $options[$type];?>"><i class="fa fa-<?php echo $icon;?>"></i></a></li>
					<?php endforeach;?>
					<?php if($instance['show_rss']) :?>
						<li><a href="<?php bloginfo('rss2_url');?>"><i class="fa fa-rss-square"></i></a></li>
					<?php endif;?>
				</ul>
			<?php else :?>
				<?php if($instance['show_rss']) :?>
					<ul class="list-inline social-media-list">
						<li><a href="<?php bloginfo('rss2_url');?>"><i class="fa fa-rss-square"></i></a></li>
					</ul>
				<?php endif;?>
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
				<label for="<?php echo $this->get_field_id('before');?>">Voor contactinformatie:</label>
				<textarea
					class="widefat"
					id="<?php echo $this->get_field_id('before');?>"
					name="<?php echo $this->get_field_name('before');?>"
				><?php echo (isset($instance['before'])) ? esc_attr($instance['before']) : '';?></textarea>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('name');?>">Naam:</label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id('name');?>"
					name="<?php echo $this->get_field_name('name');?>"
					value="<?php echo (isset($instance['name'])) ? esc_attr($instance['name']) : '';?>"
					>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('address');?>">Straat &amp; huisnummer:</label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id('address');?>"
					name="<?php echo $this->get_field_name('address');?>"
					value="<?php echo (isset($instance['address'])) ? esc_attr($instance['address']) : '';?>"
					>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('zipcode');?>">Postcode:</label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id('zipcode');?>"
					name="<?php echo $this->get_field_name('zipcode');?>"
					value="<?php echo (isset($instance['zipcode'])) ? esc_attr($instance['zipcode']) : '';?>"
					>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('city');?>">Plaats:</label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id('city');?>"
					name="<?php echo $this->get_field_name('city');?>"
					value="<?php echo (isset($instance['city'])) ? esc_attr($instance['city']) : '';?>"
					>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('country');?>">Land:</label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id('country');?>"
					name="<?php echo $this->get_field_name('country');?>"
					value="<?php echo (isset($instance['country'])) ? esc_attr($instance['country']) : '';?>"
					>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('phone');?>">Telefoon:</label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id('phone');?>"
					name="<?php echo $this->get_field_name('phone');?>"
					value="<?php echo (isset($instance['phone'])) ? esc_attr($instance['phone']) : '';?>"
					>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('fax');?>">Fax:</label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id('fax');?>"
					name="<?php echo $this->get_field_name('fax');?>"
					value="<?php echo (isset($instance['fax'])) ? esc_attr($instance['fax']) : '';?>"
					>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('email');?>">E-mail:</label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id('email');?>"
					name="<?php echo $this->get_field_name('email');?>"
					value="<?php echo (isset($instance['email'])) ? esc_attr($instance['email']) : '';?>"
					>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('website');?>">Website:</label>
				<input
					type="text"
					class="widefat"
					id="<?php echo $this->get_field_id('website');?>"
					name="<?php echo $this->get_field_name('website');?>"
					value="<?php echo (isset($instance['website'])) ? esc_attr($instance['website']) : '';?>"
					>
			</p>
			<p>
				<input
					type="checkbox"
					class="checkbox"
					id="<?php echo $this->get_field_id('show_social_media');?>"
					name="<?php echo $this->get_field_name('show_social_media');?>"
					value="1" <?php checked($instance['show_social_media']);?>
					>
				<label for="<?php echo $this->get_field_id('show_social_media');?>">Social media weergeven?</label>
			</p>
			<p>
				<input
					type="checkbox"
					class="checkbox"
					id="<?php echo $this->get_field_id('show_rss');?>"
					name="<?php echo $this->get_field_name('show_rss');?>"
					value="1" <?php checked($instance['show_rss']); ?>
					>
				<label for="<?php echo $this->get_field_id('show_rss');?>">RSS icoon weergeven?</label>
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