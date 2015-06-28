<?php namespace Gloudemans\Settings\Pages;

use Gloudemans\Settings\Field;

class Frontpage {

	protected static $pageName = 'Homepagina';

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
		add_submenu_page('theme-options', self::$pageName, self::$pageName, 'manage_options', 'frontpage-options', [$this, 'display']);
	}

	public function initializeSettings()
	{
		register_setting('frontpage-options', 'frontpage-options');

		add_settings_section(
			'frontpage-options-section',
			'',
			null,
			'frontpage-options'
		);

		add_settings_field(
			'show-slideshow',
			'Toon slideshow',
			[Field::class, 'checkbox'],
			'frontpage-options',
			'frontpage-options-section',
			['frontpage-options', 'show-slideshow']
		);

        add_settings_field(
            'slideshow-type',
            'Type slideshow',
            [Field::class, 'select'],
            'frontpage-options',
            'frontpage-options-section',
            ['frontpage-options', 'slideshow-type', [
                'bootstrap' => 'Eenvoudig',
                'revolution' => 'Revolution slider'
            ]]
        );

		add_settings_field(
			'slideshow-slug',
			'Slideshow slug',
			[Field::class, 'text'],
			'frontpage-options',
			'frontpage-options-section',
			['frontpage-options', 'slideshow-slug']
		);

		add_settings_field(
			'slideshow-size',
			'Slideshow formaat',
			[Field::class, 'select'],
			'frontpage-options',
			'frontpage-options-section',
			['frontpage-options', 'slideshow-size', [
				'fullscreen' => 'Volledig scherm',
				'box' => 'Boxed'
			]]
		);

		add_settings_field(
			'show-featured-bullets',
			'Toon featured bullets',
			[Field::class, 'checkbox'],
			'frontpage-options',
			'frontpage-options-section',
			['frontpage-options', 'show-featured-bullets']
		);

		add_settings_field(
			'show-featured-item',
			'Toon featured item',
			[Field::class, 'checkbox'],
			'frontpage-options',
			'frontpage-options-section',
			['frontpage-options', 'show-featured-item']
		);

//		add_settings_field(
//			'featured-item-text',
//			'Featured item tekst',
//			[Field::class, 'editor'],
//			'frontpage-options',
//			'frontpage-options-section',
//			['frontpage-options', 'featured-item-text', [
//				'media_buttons' => false,
//				'textarea_rows' => 6
//			]]
//		);
//
//		add_settings_field(
//			'featured-item-button-1-title',
//			'Button 1 - Titel',
//			[Field::class, 'text'],
//			'frontpage-options',
//			'frontpage-options-section',
//			['frontpage-options', 'featured-item-button-1-title']
//		);
//
//		add_settings_field(
//			'featured-item-button-1-link',
//			'Button 1 - Link',
//			[Field::class, 'url'],
//			'frontpage-options',
//			'frontpage-options-section',
//			['frontpage-options', 'featured-item-button-1-link']
//		);
//
//		add_settings_field(
//			'featured-item-button-2-title',
//			'Button 2 - Titel',
//			[Field::class, 'text'],
//			'frontpage-options',
//			'frontpage-options-section',
//			['frontpage-options', 'featured-item-button-2-title']
//		);
//
//		add_settings_field(
//			'featured-item-button-2-link',
//			'Button 2 - Link',
//			[Field::class, 'url'],
//			'frontpage-options',
//			'frontpage-options-section',
//			['frontpage-options', 'featured-item-button-2-link']
//		);
//
//		add_settings_field(
//			'featured_item_image',
//			'Featured item afbeelding',
//			[Field::class, 'media'],
//			'frontpage-options',
//			'frontpage-options-section',
//			['frontpage-options', 'featured_item_image']
//		);

		add_settings_field(
			'show-carousel',
			'Toon carousel',
			[Field::class, 'checkbox'],
			'frontpage-options',
			'frontpage-options-section',
			['frontpage-options', 'show-carousel']
		);

        add_settings_field(
            'carousel-shortcode',
            'Carousel shortcode',
            [Field::class, 'text'],
            'frontpage-options',
            'frontpage-options-section',
            ['frontpage-options', 'carousel-shortcode']
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
				settings_fields('frontpage-options');
				do_settings_sections('frontpage-options');
				?>

				<?php submit_button();?>
			</form>
		</div>

	<?php
	}

}