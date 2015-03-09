<?php namespace Gloudemans\Settings;

class Page {

	protected $subMenuPages = [];

	/**
	 * Setup the options page
	 */
	public function setup()
	{
		$this->setupPage();

		$this->setupSubPages();

		add_action('admin_enqueue_scripts', function($hook_suffix)
		{
			// first check that $hook_suffix is appropriate for your admin page
			wp_enqueue_style('wp-color-picker');
			wp_enqueue_script('color-settings', get_template_directory_uri() . '/assets/js/color-settings.js', ['wp-color-picker'], false, true);
		});
	}

	/**
	 * Initialize the new page
	 */
	public function initializePage()
	{
		add_menu_page('Thema opties', 'Thema opties', 'manage_options', 'theme-options');
	}

	public function registerSubMenuPages($subMenuPages)
	{
		$this->subMenuPages = array_merge($this->subMenuPages, $subMenuPages);
	}

	private function setupPage()
	{
		add_action('admin_menu', [$this, 'initializePage']);
	}

	private function setupSubPages()
	{
		foreach($this->subMenuPages as $subMenuPage)
		{
			$page = new $subMenuPage;
			$page->setup();
		}
	}

}