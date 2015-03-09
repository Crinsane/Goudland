<?php namespace Gloudemans\Settings\Pages;

use Gloudemans\Settings\Field;

class Company {

	protected static $pageName = 'Bedrijf';

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
		add_submenu_page('theme-options', self::$pageName, self::$pageName, 'manage_options', 'company-options', [$this, 'display']);
	}

	public function initializeSettings()
	{
		register_setting('company-options', 'company-options');

		add_settings_section(
			'company-options-section',
			'',
			null,
			'company-options'
		);

		add_settings_field(
			'name',
			'Naam',
			[Field::class, 'text'],
			'company-options',
			'company-options-section',
			['company-options', 'name']
		);

		add_settings_field(
			'address',
			'Straat &amp; huisnummer',
			[Field::class, 'text'],
			'company-options',
			'company-options-section',
			['company-options', 'address']
		);

		add_settings_field(
			'zipcode',
			'Postcode',
			[Field::class, 'text'],
			'company-options',
			'company-options-section',
			['company-options', 'zipcode']
		);

		add_settings_field(
			'city',
			'Plaats',
			[Field::class, 'text'],
			'company-options',
			'company-options-section',
			['company-options', 'city']
		);

		add_settings_field(
			'country',
			'Land',
			[Field::class, 'text'],
			'company-options',
			'company-options-section',
			['company-options', 'country']
		);

		add_settings_field(
			'phone',
			'Telefoon',
			[Field::class, 'text'],
			'company-options',
			'company-options-section',
			['company-options', 'phone']
		);

		add_settings_field(
			'fax',
			'Fax',
			[Field::class, 'text'],
			'company-options',
			'company-options-section',
			['company-options', 'fax']
		);

		add_settings_field(
			'mail',
			'E-mail',
			[Field::class, 'text'],
			'company-options',
			'company-options-section',
			['company-options', 'mail']
		);

		add_settings_field(
			'website',
			'Website',
			[Field::class, 'text'],
			'company-options',
			'company-options-section',
			['company-options', 'website']
		);

		add_settings_field(
			'iban',
			'IBAN',
			[Field::class, 'text'],
			'company-options',
			'company-options-section',
			['company-options', 'iban']
		);

		add_settings_field(
			'kvk',
			'KvK',
			[Field::class, 'text'],
			'company-options',
			'company-options-section',
			['company-options', 'kvk']
		);

		add_settings_field(
			'vat',
			'BTW',
			[Field::class, 'text'],
			'company-options',
			'company-options-section',
			['company-options', 'vat']
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
					settings_fields('company-options');
					do_settings_sections('company-options');
					?>

					<?php submit_button();?>
				</form>
			</div>

		<?php
	}

}