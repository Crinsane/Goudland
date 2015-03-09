<?php

class CustomStyles {

	public function __construct()
	{
		require_once __DIR__.'/libraries/Color.php';

		add_action('wp_ajax_custom_css', [$this, 'customCss']);
		add_action('wp_ajax_nopriv_custom_css', [$this, 'customCss']);
	}

	public function customCss() {
		require_once __DIR__.'/../assets/css/custom.css.php';
		exit;
	}
}