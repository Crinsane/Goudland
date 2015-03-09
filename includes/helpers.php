<?php

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