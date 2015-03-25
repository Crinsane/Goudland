<?php namespace Gloudemans\Theme;

class CustomExcerpt {

	public function __construct()
	{
		add_filter('excerpt_more', [$this, 'customExcerptLength']);
	}

	public function customExcerptLength($more)
	{
		global $post;

		if(is_search()) return '</p><p class="read-more"><a href="'. get_permalink($post->ID) . '"><i class="fa fa-chevron-right"></i> Lees meer</a></p>';
		if(is_singular('product') || is_page_template('product-overview.php') || is_tax(['product-category', 'product-color', 'product-tags'])) return '';

		return '</p><p><a href="'. get_permalink($post->ID) . '" class="btn btn-info read-more">Lees meer&hellip;</a>';
	}

}