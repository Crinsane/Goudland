<?php

class Register_Sidebars {

	public function __construct()
	{
		add_action('widgets_init', [$this, 'registerSidebars']);
	}

	public function registerSidebars()
	{
		$this->registerSidebarBlog();

		$this->registerSidebarSearch();

		$this->registerSidebarContact();

		$this->registerSidebarShop();

		$this->registerSidebarFooter();
	}

	protected function registerSidebarBlog()
	{
		$this->registerPageSidebar('Blog Sidebar', 'sidebar-blog', 'Sidebar voor de blog pagina');
	}

	protected function registerSidebarSearch()
	{
		$this->registerPageSidebar('Zoekresultaten Sidebar', 'sidebar-search', 'Sidebar voor de zoekresultaten pagina');
	}

	protected function registerSidebarContact()
	{
		$this->registerPageSidebar('Contact Sidebar', 'sidebar-contact', 'Sidebar voor de contact pagina');
	}

	protected function registerSidebarShop()
	{
		$this->registerPageSidebar('Shop Sidebar', 'sidebar-shop', 'Sidebar voor de shop pagina');
	}

	protected function registerSidebarFooter()
	{
		register_sidebar([
			'name'          => 'Footer Sidebar',
			'id'            => 'sidebar-footer',
			'description'   => 'Sidebar voor de footer',
			'before_widget' => '<div class="col-md-3 footer-widget-wrapper"><div class="widget footer-widget %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="widget-title">',
			'after-title'   => '</h4>'
		]);
	}

	protected function registerPageSidebar($name, $id, $description)
	{
		register_sidebar([
			'name'          => $name,
			'id'            => $id,
			'description'   => $description,
			'before_widget' => '<div class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after-title'   => '</h4>'
		]);
	}

}