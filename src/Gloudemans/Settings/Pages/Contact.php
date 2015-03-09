<?php namespace Gloudemans\Settings\Pages;

use Gloudemans\Settings\Field;

class Contact {

	protected static $pageName = 'Contact';

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
		add_submenu_page('theme-options', self::$pageName, self::$pageName, 'manage_options', 'contact-options', [$this, 'display']);
	}


	public function initializeSettings()
	{
		register_setting('contact-options', 'contact-options');

		add_settings_section(
			'contact-options-section',
			'',
			null,
			'contact-options'
		);

		add_settings_field(
			'contact-email',
			'Contact formulier e-mail',
			[Field::class, 'text'],
			'contact-options',
			'contact-options-section',
			['contact-options', 'contact-email']
		);

		add_settings_field(
			'contact-maps',
			'Google maps URL',
			[Field::class, 'text'],
			'contact-options',
			'contact-options-section',
			['contact-options', 'contact-maps']
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
						settings_fields('contact-options');
						do_settings_sections('contact-options');
					?>

					<?php submit_button();?>
				</form>
			</div>

		<?php
	}

}