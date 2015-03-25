<?php namespace Gloudemans\Theme;

class PopularPosts {

	/**
	 * Register the AJAX actions for the popular posts counter and enqueue script
	 */
	public function __construct()
	{
		add_action('wp_ajax_popular_posts', [$this, 'countPopularPost']);
		add_action('wp_ajax_nopriv_popular_posts', [$this, 'countPopularPost']);
		add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);
	}

	/**
	 * Add the current page view tot the total view count
	 */
	public function countPopularPost()
	{
		$postViewCount = get_option('post_view_count');

		if(empty($postViewCount)) $postViewCount = [];

		$postId = intval($_POST['postId']);

		$postViewCount = $this->countView($postViewCount, $postId);

		update_option('post_view_count', $postViewCount);
	}

	/**
	 * Enqueue the popular posts script
	 */
	public function enqueueScripts()
	{
		wp_register_script('popular-posts', get_template_directory_uri() . '/assets/js/popular-posts.js', ['jquery'], false, true);
		wp_enqueue_script('popular-posts');

		global $post;

		wp_localize_script('popular-posts', 'popularPosts', [
			'url' => admin_url('admin-ajax.php'),
			'postId' => $post->ID
		]);
	}

	/**
	 * Add the view count
	 *
	 * @param  array  $postViewCount
	 * @param  int    $postId
	 * @return mixed
	 */
	protected function countView($postViewCount, $postId)
	{
		if(isset($postViewCount[$postId]))
		{
			$postViewCount[$postId]++;
		}
		else
		{
			$postViewCount[$postId] = 1;
		}

		return $postViewCount;
	}

}