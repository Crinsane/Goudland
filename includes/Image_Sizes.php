<?php

class Image_Sizes {

	public function __construct()
	{
		add_image_size('sidebar-slideshow', 263, 160, ['center', 'center']);
		add_image_size('post-slideshow', 798, 320, ['center', 'center']);
		add_image_size('post-featured', 798, 320, ['center', 'center']);
		add_image_size('sidebar-image', 81, 81, ['center', 'center']);
		add_image_size('recent-post-thumbnail', 55, 55, ['center', 'center']);
		add_image_size('text-widget-image', 243, 100, ['center', 'center']);
		add_image_size('front-page-slideshow', 1920, 667, ['center', 'center']);
		add_image_size('recent-popular-posts-widget-thumbnail', 231, 120, ['center', 'center']);
		add_image_size('product-loop', 261, 261, ['center', 'center']);
		add_image_size('product-single', 464, 320, ['center', 'center']);
		add_image_size('product-single-thumbnail', 135, 120, ['center', 'center']);
	}

}