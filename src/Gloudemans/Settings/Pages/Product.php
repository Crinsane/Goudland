<?php namespace Gloudemans\Settings\Pages;

use Gloudemans\Settings\Field;

class Product {

	protected static $pageName = 'Producten';

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
		add_submenu_page('theme-options', self::$pageName, self::$pageName, 'manage_options', 'product-options', [$this, 'display']);
	}


	public function initializeSettings()
	{
		register_setting('product-options', 'product-options');

		add_settings_section(
			'product-options-section',
			'',
			null,
			'product-options'
		);

		add_settings_field(
			'product-show-price',
			'Toon product prijs',
			[Field::class, 'checkbox'],
			'product-options',
			'product-options-section',
			['product-options', 'product-show-price']
		);

		add_settings_field(
			'product-show-sale',
			'Toon product actie',
			[Field::class, 'checkbox'],
			'product-options',
			'product-options-section',
			['product-options', 'product-show-sale']
		);

		add_settings_field(
			'product-show-category',
			'Toon product categorie&euml;n',
			[Field::class, 'checkbox'],
			'product-options',
			'product-options-section',
			['product-options', 'product-show-category']
		);

		add_settings_field(
			'product-show-tags',
			'Toon product tags',
			[Field::class, 'checkbox'],
			'product-options',
			'product-options-section',
			['product-options', 'product-show-tags']
		);

		add_settings_field(
			'product-show-cart',
			'Toon winkelkarretje',
			[Field::class, 'checkbox'],
			'product-options',
			'product-options-section',
			['product-options', 'product-show-cart']
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
						settings_fields('product-options');
						do_settings_sections('product-options');
					?>

					<?php submit_button();?>
				</form>
			</div>

		<?php
	}

}