<?php namespace Gloudemans\Theme;

class ThemeMenus {

	public function __construct()
	{
		add_action('init', [$this, 'registerMenus']);
	}

	public function registerMenus()
	{
		register_nav_menus([
			'primary-menu' => 'Primary Menu',
			'footer_menu' => 'Footer Menu',
		]);
	}
}