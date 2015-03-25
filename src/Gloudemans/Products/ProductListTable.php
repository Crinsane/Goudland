<?php namespace Gloudemans\Products;

class ProductListTable {

	public function __construct()
	{
		add_filter('manage_product_posts_columns', [$this, 'header']);
		add_action('manage_product_posts_custom_column', [$this, 'content'], 10, 2);
	}

	public function header($defaults)
	{
		$front = array_slice($defaults, 0, 1);
		$end = array_slice($defaults, 1);
		$new = ['featured_image' => 'Afbeelding'];

		return $front + $new + $end;
	}

	public function content($columnName, $postID) {
		if ($columnName == 'featured_image')
		{
			$postFeaturedImage = $this->getFeaturedImage($postID);
			if ($postFeaturedImage)
			{
				echo '<a href="' . get_edit_post_link($postID) . '"><img src="' . $postFeaturedImage . '"></a>';
			}
		}
	}

	function getFeaturedImage($postID) {
		$postThumbnailID = get_post_thumbnail_id($postID);
		if ($postThumbnailID) {
			$postThumbnailImg = wp_get_attachment_image_src($postThumbnailID, 'sidebar-image');
			return $postThumbnailImg[0];
		}
	}

}