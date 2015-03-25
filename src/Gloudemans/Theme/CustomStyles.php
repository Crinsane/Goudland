<?php namespace Gloudemans\Theme;

class CustomStyles {

	public function __construct()
	{
		add_action('wp_ajax_custom_css', [$this, 'customCss']);
		add_action('wp_ajax_nopriv_custom_css', [$this, 'customCss']);
	}

	public function customCss() {
		require_once get_template_directory() . '/assets/css/custom.css.php';
		exit;
	}
}