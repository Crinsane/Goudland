<?php namespace Gloudemans\Settings\Pages;

use Gloudemans\Settings\Field;

class Main {

	protected static $pageName = 'Algemeen';

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
		add_submenu_page('theme-options', self::$pageName, self::$pageName, 'manage_options', 'theme-options', [$this, 'display']);
	}


	public function initializeSettings()
	{
		register_setting('theme-options', 'theme-options');

		add_settings_section(
			'theme-options-section',
			'',
			null,
			'theme-options'
		);

		add_settings_field(
			'theme-color',
			'Thema kleur',
			[Field::class, 'color'],
			'theme-options',
			'theme-options-section',
			['theme-options', 'theme-color']
		);

		add_settings_field(
			'theme-font',
			'Thema lettertype',
			[Field::class, 'text'],
			'theme-options',
			'theme-options-section',
			['theme-options', 'theme-font']
		);

		add_settings_field(
			'theme-header',
			'Thema header kleur',
			[Field::class, 'color'],
			'theme-options',
			'theme-options-section',
			['theme-options', 'theme-header']
		);

		add_settings_field(
			'theme-socialmedia-footer',
			'Toon social media footer',
			[Field::class, 'checkbox'],
			'theme-options',
			'theme-options-section',
			['theme-options', 'theme-socialmedia-footer']
		);

		add_settings_field(
			'theme-footer',
			'Toon footer',
			[Field::class, 'checkbox'],
			'theme-options',
			'theme-options-section',
			['theme-options', 'theme-footer']
		);

		add_settings_field(
			'theme-footer-color',
			'Thema footer kleur 1',
			[Field::class, 'color'],
			'theme-options',
			'theme-options-section',
			['theme-options', 'theme-footer-color']
		);

		add_settings_field(
			'theme-bottom-footer',
			'Thema footer kleur 2',
			[Field::class, 'color'],
			'theme-options',
			'theme-options-section',
			['theme-options', 'theme-bottom-footer']
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
						settings_fields('theme-options');
						do_settings_sections('theme-options');
					?>

					<?php submit_button();?>
				</form>
			</div>

		<?php
	}

}