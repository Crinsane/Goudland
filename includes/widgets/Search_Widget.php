<?php

class Search_Widget extends WP_Widget_Search {

	public function __construct() {
		$widget_ops = array('classname' => 'search-widget', 'description' => __( "A search form for your site.") );
		WP_Widget::__construct( 'search', _x( 'Search', 'Search widget' ), $widget_ops );
	}

}