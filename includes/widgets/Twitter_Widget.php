<?php

class Twitter_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{
		$params = [
			'name' => 'Twitter Feed',
			'classname' => 'twitter-widget',
			'description' => 'Toon uw Twitter feed in een sidebar'
		];

		parent::__construct('Twitter_Widget', '', $params);
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
		$tweets = $this->getTweets($instance['count']);

		echo $args['before_widget'];
		echo $args['before_title'] . $instance['title'] . $args['after_title'];
		?>

		<ul class="media-list">
			<?php foreach($tweets as $tweet) :?>
				<li class="media">
					<a class="pull-left" href="http://twitter.com/<?php echo $tweet->user->screen_name;?>">
						<img class="media-object" src="<?php echo $tweet->user->profile_image_url;?>" alt="Twitter" height="30px" width="30px">
					</a>
					<div class="media-body">
						<h4 class="media-heading"><?php echo $tweet->user->screen_name;?></h4>
					</div>
					<div class="twitter-message">
						<?php echo $this->replaceTweetLinks($tweet->text);?>
					</div>
					<div class="twitter-meta">
						<?php echo $this->timeAgo($tweet->created_at);?>
					</div>
				</li>
			<?php endforeach;?>
		</ul>
		<div class="all-tweets">
			<a href="http://twitter.com/<?php echo $tweet->user->screen_name;?>"><i class="fa fa-twitter"></i> Alle tweets bekijken</a>
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
				<label for="<?php echo $this->get_field_id('count');?>">Maximum aantal tweets:</label>
				<select id="<?php echo $this->get_field_id('count');?>" name="<?php echo $this->get_field_name('count');?>">
					<?php for($i = 1; $i <= 10; ++$i) :?>
						<option value="<?php echo $i;?>" <?php selected( $instance['count'], $i);?>><?php echo $i;?></option>
					<?php endfor;?>
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

	/**
	 * Get the tweets for the user
	 *
	 * @param  int  $count
	 * @return array|mixed
	 */
	private function getTweets($count)
	{
		if(get_transient('twitter-feed-timeline-' . $count))
		{
			return get_transient('twitter-feed-timeline-' . $count);
		}

		$tweets = $this->getTweetsFromApi( $count );

		set_transient('twitter-feed-timeline-' . $count, $tweets, 900);

		return $tweets;
	}

	/**
	 * Replace Twitter usernames and hashtags
	 *
	 * @param  string  $tweet
	 * @return string
	 */
	protected function replaceTweetLinks($tweet)
	{
		$tweet = $this->replaceHashTagsInTweet($tweet);

		return $this->replaceUsernamesInTweet($tweet);
	}

	/**
	 * Replace Twitter hashtags with links to the search page
	 *
	 * @param  string  $tweet
	 * @return mixed
	 */
	protected function replaceHashTagsInTweet($tweet)
	{
		return preg_replace('/(^|\s)#(\w*[a-zA-Z_]+\w*)/', '\1<a href="http://twitter.com/search?q=%23\2">#\2</a>', $tweet);
	}

	/**
	 * Replace Twitter usernames with links to the user profile
	 *
	 * @param  string  $tweet
	 * @return string
	 */
	protected function replaceUsernamesInTweet($tweet)
	{
		return preg_replace('/@([a-zA-Z0-9_]+)/', '<a href="http://twitter.com/$1">@$1</a>', $tweet);
	}

	/**
	 * Get the 'time ago' version of the datetime
	 *
	 * @param  string  $date
	 * @return string
	 */
	protected function timeAgo($date)
	{
		if(empty($date))
		{
			return $date;
		}

		$periods = ['seconde', 'minuut', 'uur', 'dag', 'week', 'maand', 'jaar', 'eeuw'];
		$periodsPlural = ['seconden', 'minuten', 'uren', 'dagen', 'weken', 'maanden', 'jaren', 'eeuwen'];
		$lengths = ['60', '60', '24', '7', '4.35', '12', '10'];

		$now = time();
		$unixDate = strtotime( $date );

		if(empty($unixDate))
		{
			return $date;
		}

		if( $now > $unixDate )
		{
			$difference = $now - $unixDate;
			$tense = 'geleden';
		}
		else
		{
			$difference = $unixDate - $now;
			$tense = 'vanaf nu';
		}

		for($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++)
		{
			$difference /= $lengths[$j];
		}

		$difference = round($difference);
		$period = ($difference != 1) ? $periodsPlural[$j] : $periods[$j];

		return "$difference $period {$tense}";

	}

	/**
	 * Get the Twitter account keys
	 *
	 * @return array
	 */
	protected function getTwitterAccountKeys()
	{
		$settings = [
			'oauth_access_token'        => "198443480-qereeyRCJBG3Avt1i2106JzFWQeM24lKLRlIHGOl",
			'oauth_access_token_secret' => "f94S35kQLfdKoBpgaAdQvBVLEOLLNnbnvmjFt8IMqeML7",
			'consumer_key'              => "xGnec7t989CZDDoDFpy6VYUtn",
			'consumer_secret'           => "VGjLpSYIqROBFX5IOBPn9bwp1RZwO1jTwlLaVMxuTVWtfOANPO"
		];

		return $settings;
	}

	/**
	 * Get the tweets from the Twitter API
	 *
	 * @param  int    $count
	 * @param  array  $settings
	 * @return string
	 * @throws \Exception
	 */
	protected function getTweetsFromTwitter( $count, $settings )
	{
		$url           = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
		$requestMethod = 'GET';
		$twitter       = new TwitterAPIExchange( $settings );
		$getfield      = '?screen_name=crinsane&count=' . $count;

		$tweets = $twitter->setGetfield( $getfield )
		                  ->buildOauth( $url, $requestMethod )
		                  ->performRequest();

		return $tweets;
	}

	/**
	 * Get the tweets from the Twitter API
	 *
	 * @param  int  $count
	 * @return array|mixed|string
	 */
	protected function getTweetsFromApi($count)
	{
		require_once(__DIR__ . '/../libraries/TwitterAPIExchange.php');

		$settings = $this->getTwitterAccountKeys();

		$tweets = $this->getTweetsFromTwitter($count, $settings);
		$tweets = json_decode($tweets);

		return $tweets;
	}
}