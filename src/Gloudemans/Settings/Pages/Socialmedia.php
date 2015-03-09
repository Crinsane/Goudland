<?php namespace Gloudemans\Settings\Pages;

use Gloudemans\Settings\Field;

class Socialmedia {

	protected static $pageName = 'Social Media';

	/**
	 * Setup the options page
	 */
	public function setup()
	{
		add_action('admin_menu', [$this, 'initializePage']);
		add_action('admin_init', [$this, 'initializeSettings']);
	}

	/**
	 * Initialize the new page
	 */
	public function initializePage()
	{
		add_submenu_page('theme-options', self::$pageName, self::$pageName, 'manage_options', 'socialmedia-options', [$this, 'display']);
	}

	public function initializeSettings()
	{
		register_setting('socialmedia-options', 'socialmedia-options');

		add_settings_section(
			'socialmedia-options-section',
			'',
			null,
			'socialmedia-options'
		);

		add_settings_field(
			'facebook',
			'Facebook',
			[Field::class, 'text'],
			'socialmedia-options',
			'socialmedia-options-section',
			['socialmedia-options', 'facebook']
		);

		add_settings_field(
			'twitter',
			'Twitter',
			[Field::class, 'text'],
			'socialmedia-options',
			'socialmedia-options-section',
			['socialmedia-options', 'twitter']
		);

		add_settings_field(
			'google',
			'Google+',
			[Field::class, 'text'],
			'socialmedia-options',
			'socialmedia-options-section',
			['socialmedia-options', 'google']
		);

		add_settings_field(
			'pinterest',
			'Pinterest',
			[Field::class, 'text'],
			'socialmedia-options',
			'socialmedia-options-section',
			['socialmedia-options', 'pinterest']
		);

		add_settings_field(
			'linkedin',
			'LinkedIn',
			[Field::class, 'text'],
			'socialmedia-options',
			'socialmedia-options-section',
			['socialmedia-options', 'linkedin']
		);

		add_settings_field(
			'tumblr',
			'Tumblr',
			[Field::class, 'text'],
			'socialmedia-options',
			'socialmedia-options-section',
			['socialmedia-options', 'tumblr']
		);

		add_settings_field(
			'flickr',
			'Flickr',
			[Field::class, 'text'],
			'socialmedia-options',
			'socialmedia-options-section',
			['socialmedia-options', 'flickr']
		);

		add_settings_field(
			'instagram',
			'Instagram',
			[Field::class, 'text'],
			'socialmedia-options',
			'socialmedia-options-section',
			['socialmedia-options', 'instagram']
		);

		add_settings_field(
			'github',
			'Github',
			[Field::class, 'text'],
			'socialmedia-options',
			'socialmedia-options-section',
			['socialmedia-options', 'github']
		);

		add_settings_field(
			'bitbucket',
			'Bitbucket',
			[Field::class, 'text'],
			'socialmedia-options',
			'socialmedia-options-section',
			['socialmedia-options', 'bitbucket']
		);

		add_settings_field(
			'vimeo',
			'Vimeo',
			[Field::class, 'text'],
			'socialmedia-options',
			'socialmedia-options-section',
			['socialmedia-options', 'vimeo']
		);

		add_settings_field(
			'youtube',
			'YouTube',
			[Field::class, 'text'],
			'socialmedia-options',
			'socialmedia-options-section',
			['socialmedia-options', 'youtube']
		);

	}

	/**
	 * Display the page content
	 */
	public function display()
	{
		?>

		<div class="wrap">
			<h2><?php echo self::$pageName;?></h2>
			<form method="post" action="options.php">

				<?php
				settings_fields('socialmedia-options');
				do_settings_sections('socialmedia-options');
				?>

				<?php submit_button();?>
			</form>
		</div>

	<?php
	}

}