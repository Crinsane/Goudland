<?php namespace Gloudemans\Theme;

class RegisterStylesScripts {

	public function __construct()
	{
		add_action('wp_enqueue_scripts', [$this, 'enqueueStylesAndScripts']);
	}

	public function enqueueStylesAndScripts()
	{
		$this->registerStyles();

		$this->registerScripts();

		$this->enqueueStyles();

		$this->enqueueScripts();

		if($this->isShop())
		{
			$this->enqueueShopStylesAndScripts();
		}
	}

	protected function registerStyles()
	{
		wp_register_style('google-font-lato', 'http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic');
		wp_register_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');
		wp_register_style('bootstrap-select-css', get_template_directory_uri() . '/assets/css/bootstrap-select.css', ['bootstrap-css']);
		wp_register_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css');
		wp_register_style('main-style', get_stylesheet_uri());
		wp_register_style('dynamic-css', admin_url('admin-ajax.php') . '?action=custom_css');
	}

	protected function registerScripts()
	{
		wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', ['jquery'], false, true);
		wp_register_script('bootstrap-select', get_template_directory_uri() . '/assets/js/bootstrap-select.js', [
				'jquery',
				'bootstrap'
			], '1.6.3', true);
		wp_register_script('jquery-cycle2', get_template_directory_uri() . '/assets/js/jquery.cycle2.js', ['jquery'], '2.1.5', true);
		wp_register_script('jquery-cycle2-carousel', get_template_directory_uri() . '/assets/js/jquery.cycle2.carousel.js', [
				'jquery',
				'jquery-cycle2'
			], '2.1.5', true);
		wp_register_script('main-scripts', get_template_directory_uri() . '/assets/js/scripts.js', [
				'jquery',
				'jquery-form'
			], false, true);
		wp_register_script('shop-scripts', get_template_directory_uri() . '/assets/js/shop-scripts.js', ['jquery'], false, true);
	}

	protected function enqueueStyles()
	{
		wp_enqueue_style('google-font-lato');
		wp_enqueue_style('bootstrap-css');
		wp_enqueue_style('font-awesome');
		wp_enqueue_style('main-style');
		wp_enqueue_style('dynamic-css');
	}

	protected function enqueueScripts()
	{
		wp_enqueue_script('bootstrap');
		wp_enqueue_script('jquery-cycle2-carousel');
		wp_enqueue_script('main-scripts');
	}

	/**
	 * @return bool
	 */
	protected function isShop()
	{
		return is_page_template('product-overview.php') || is_tax();
	}

	protected function enqueueShopStylesAndScripts()
	{
		wp_enqueue_style('bootstrap-select-css');

		wp_enqueue_script('bootstrap-select');
		wp_enqueue_script('shop-scripts');
	}

}