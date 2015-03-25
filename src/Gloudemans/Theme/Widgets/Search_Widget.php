<?php namespace Gloudemans\Theme\Widgets;

use WP_Widget;
use WP_Widget_Search;

class Search_Widget extends WP_Widget_Search {

	public function __construct() {
		$widget_ops = ['classname' => 'search-widget', 'description' => __( "A search form for your site.") ];
		WP_Widget::__construct( 'search', _x( 'Search', 'Search widget' ), $widget_ops );
	}

}