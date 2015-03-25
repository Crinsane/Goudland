<?php


if ( ! function_exists('getPageTitle'))
{
	/**
	 * Get the page title
	 *
	 * @return null|string
	 */
	function getPageTitle()
	{
		global $post;

		if(is_home()) return get_the_title(get_option('page_for_posts', true));
		if(is_tag()) return single_tag_title('Tag: ', false);
		if(is_category()) return single_cat_title('Categorie: ', false);
		if(is_search()) return 'Zoeken: "' . get_search_query() . '"';
		if(is_404()) return '404 - Pagina niet gevonden';
		if(is_tax())
		{
			$obj = get_queried_object();
			$taxonomy = get_taxonomy($obj->taxonomy);

			return $taxonomy->labels->name . ': ' . single_term_title('', false);
		}

		return $post->post_title;
	}
}


if ( ! function_exists('the_breadcrumb'))
{
	/**
	 * Helper function for displaying the breadcrumbs
	 */
	function the_breadcrumb()
	{
		$breadcrumbs = new \Gloudemans\Theme\Breadcrumbs();

		return $breadcrumbs->displayBreadcrumbs();
	}
}

if ( ! function_exists('dd'))
{
	/**
	 * Dump the passed variables and end the script.
	 *
	 * @param  dynamic  mixed
	 * @return void
	 */
	function dd()
	{
		array_map(function($x) { var_dump($x); }, func_get_args()); die;
	}
}