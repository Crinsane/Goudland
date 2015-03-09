<?php

class ThemeCustomizer {

	protected $wpCustomize;

	/**
	 * Theme Customizer Constructor
	 */
	public function __construct()
	{
		add_action('customize_register', [$this, 'addCustomSettings']);
		add_action('admin_enqueue_scripts', [$this, 'enqueueAdminScripts']);
	}

	/**
	 * Add the custom settings
	 *
	 * @param $wp_customize
	 */
	public function addCustomSettings($wp_customize)
	{
		$this->wpCustomize = $wp_customize;

		$this->removeUnusedSections();
		$this->addSiteHeaderSection();
		$this->addThemeColorSetting();
		$this->addSiteLogoSetting();

		$this->addFrontPageSection();
		$this->addFrontPageSettings();
	}

	/**
	 * Add the site header section
	 */
	protected function addSiteHeaderSection()
	{
		$this->wpCustomize->add_section(
			'site_header',
			[
				'title' => 'Siteheader',
				'priority'=> 22,
			]
		);
	}

	/**
	 * Add the front page section
	 */
	protected function addFrontPageSection()
	{
		$this->wpCustomize->add_section(
			'front_page',
			[
				'title' => 'Homepagina',
				'priority' => 25,
				'description' => 'Activeer of deactiveer de elementen die op de homepagina zichtbaar moeten zijn.'
			]
		);
	}

	/**
	 * Add the theme color setting
	 */
	protected function addThemeColorSetting()
	{
		$this->wpCustomize->add_setting('theme_color', [
			'default' => '#21c2f8',
			'transport' => 'refresh',
		]);

		$control = new WP_Customize_Color_Control($this->wpCustomize, 'theme_color', [
			'label' => 'Thema kleur',
			'section' => 'colors',
			'settings' => 'theme_color',
		]);

		$this->wpCustomize->add_control($control);
	}

	/**
	 * Add the site logo setting
	 */
	protected function addSiteLogoSetting()
	{
		$this->wpCustomize->add_setting('site_logo', [
			'default' => null,
			'transport' => 'refresh',
		]);

		$control = new WP_Customize_Image_Control($this->wpCustomize, 'site_logo', [
			'label'      => 'Site logo',
			'section'    => 'site_header',
			'settings'   => 'site_logo',
		]);

		$control->remove_tab('upload-new');
		$control->add_tab('library', __('Media Library'), [$this, 'generateSiteLogoMediaLibraryTab']);

		$this->wpCustomize->add_control($control);
	}

	/**
	 * Generate the media library tab for the site logo
	 */
	public function generateSiteLogoMediaLibraryTab()
	{
		?>
			<a class="button site-header-logo">
				<?php _e('Open Library');?>
			</a>
		<?php
	}

	/**
	 * Add the front page settings
	 */
	protected function addFrontPageSettings()
	{
		$this->addFrontPageShowSlideshowSetting();
		$this->addFrontPageSlideshowSlugSetting();
		$this->addFrontPageShowFeaturedBulletsSetting();
		$this->addFrontPageShowFeaturedItemSetting();
		$this->addFrontPageShowCarouselSetting();
//		$this->addFrontPageCarouselOptionsSetting();
	}

	/**
	 * Remove unused sections
	 */
	protected function removeUnusedSections()
	{
		$this->wpCustomize->remove_section('static_front_page');
		$this->wpCustomize->remove_section('nav');
	}

	/**
	 * Add the setting to select whether to show the slideshow on the front page
	 */
	protected function addFrontPageShowSlideshowSetting()
	{
		$this->wpCustomize->add_setting('show_slideshow', [
			'default' => true,
			'transport' => 'refresh',
		]);

		$control = new WP_Customize_Control($this->wpCustomize, 'show_slideshow', [
			'label' => 'Slideshow',
			'section' => 'front_page',
			'settings' => 'show_slideshow',
			'type' => 'checkbox',
		]);

		$this->wpCustomize->add_control($control);
	}

	/**
	 * Add the setting to specify the slideshow slug
	 */
	protected function addFrontPageSlideshowSlugSetting()
	{
		$this->wpCustomize->add_setting('front_page_slideshow_slug', [
			'default' => null,
			'transport' => 'refresh',
		]);

		$control = new WP_Customize_Control($this->wpCustomize, 'front_page_slideshow_slug', [
			'section' => 'front_page',
			'settings' => 'front_page_slideshow_slug',
			'type' => 'text',
			'placeholder' => 'Slideshow slug'
		]);

		$this->wpCustomize->add_control($control);
	}

	/**
	 * Add the setting to select whether to show the featured bullets on the front page
	 */
	protected function addFrontPageShowFeaturedBulletsSetting()
	{
		$this->wpCustomize->add_setting('show_featured_bullets', [
			'default' => true,
			'transport' => 'refresh',
		]);

		$control = new WP_Customize_Control($this->wpCustomize, 'show_featured_bullets', [
			'label' => 'Featured bullets',
			'section' => 'front_page',
			'settings' => 'show_featured_bullets',
			'type' => 'checkbox',
		]);

		$this->wpCustomize->add_control($control);
	}

	/**
	 * Add the setting to select whether to show the featured item on the front page
	 */
	protected function addFrontPageShowFeaturedItemSetting()
	{
		$this->wpCustomize->add_setting('show_featured_item', [
			'default' => true,
			'transport' => 'refresh',
		]);

		$control = new WP_Customize_Control($this->wpCustomize, 'show_featured_item', [
			'label' => 'Featured item',
			'section' => 'front_page',
			'settings' => 'show_featured_item',
			'type' => 'checkbox',
		]);

		$this->wpCustomize->add_control($control);
	}

	/**
	 * Add the setting to select whether to show the carousel on the front page
	 */
	protected function addFrontPageShowCarouselSetting()
	{
		$this->wpCustomize->add_setting('show_carousel', [
			'default' => true,
			'transport' => 'refresh',
		]);

		$control = new WP_Customize_Control($this->wpCustomize, 'show_carousel', [
			'label' => 'Carousel',
			'section' => 'front_page',
			'settings' => 'show_carousel',
			'type' => 'checkbox',
		]);

		$this->wpCustomize->add_control($control);
	}

	protected function addFrontPageCarouselOptionsSetting()
	{
		$this->wpCustomize->add_setting('carousel_settings', [
			'default' => null,
			'transport' => 'refresh',
		]);

		$control = new WP_Customize_Image_Control($this->wpCustomize, 'carousel_settings', [
			'label'      => 'Afbeeldingen',
			'section'    => 'front_page',
			'settings'   => 'carousel_settings',
		]);

		$control->remove_tab('upload-new');
		$control->add_tab('library', __('Media Library'), [$this, 'generateCarouselMediaLibraryTab']);

		$this->wpCustomize->add_control($control);
	}

	/**
	 * Generate the media library tab
	 */
	public function generateSiteHeaderMediaLibraryTab()
	{
		?>
		<a class="button site-header-logo">
			<?php _e('Open Library');?>
		</a>
	<?php
	}

	/**
	 * Enqueue the styles and scripts on the admin page
	 */
	public function enqueueAdminScripts()
	{
		wp_enqueue_media();
		wp_enqueue_script('theme-customizer-custom', get_template_directory_uri() . '/assets/js/theme-customizer.js');
	}

}