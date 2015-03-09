<?php

class Breadcrumbs {

	/**
	 * Holds the breadcrumbs
	 *
	 * @var array
	 */
	protected $breadcrumbs;

	/**
	 * Generate breadcrumbs for the current page
	 */
	public function __construct()
	{
		$this->buildBreadcrumbs();
	}

	/**
	 * Display the breadcrumbs
	 */
	public function displayBreadcrumbs()
	{
		?>
		<ol class="breadcrumb">
			<?php foreach($this->breadcrumbs as $crumb) :?>
				<?php if(empty($crumb['url'])) :?>
					<li class="active"><?php echo $crumb['title'];?></li>
				<?php else :?>
					<li><a href="<?php echo $crumb['url'];?>"><?php echo $crumb['title'];?></a></li>
				<?php endif;?>
			<?php endforeach;?>
		</ol>
	<?php
	}

	/**
	 * Build the breadcrumbs array
	 */
	protected function buildBreadcrumbs()
	{
		global $post;

		if( ! is_front_page())
		{
			$this->addBreadcrumb(
				get_the_title(get_option('page_on_front', true)),
				get_option('home')
			);

			if(is_tax(['product-category', 'product-color', 'product-tags']))
			{
				$this->addBreadcrumb(
					'Producten',
					''
				);

				$this->addBreadcrumb(
					single_term_title('', false),
					''
				);
			}

			if(is_page())
			{
				if($post->post_parent)
				{
					$postParents = get_post_ancestors($post->ID);

					foreach($postParents as $parent)
					{
						$this->addBreadcrumb(
							get_the_title($parent),
							get_permalink($parent)
						);
					}
				}

				$this->addBreadcrumb(get_the_title(), '');
			}

			if(is_home())
			{
				$this->addBreadcrumb(
					get_the_title(get_option('page_for_posts', true)),
					''
				);
			}

			if(is_single())
			{
				if(is_singular('product'))
				{
					$this->addBreadcrumb(
						'Producten',
						''
					);
				}
				else
				{
					$this->addBreadcrumb(
						get_the_title(get_option('page_for_posts', true)),
						get_the_permalink(get_option('page_for_posts', true))
					);
				}

				$this->addBreadcrumb(get_the_title(), '');
			}

			if(is_search())
			{
				$this->addBreadcrumb('Zoeken', '');
			}

			if(is_tag())
			{
				$this->addBreadcrumb(
					single_tag_title('Tag: ', false) ,
					''
				);
			}

			if(is_category())
			{
				$this->addBreadcrumb(
					single_cat_title('Categorie: ', false) ,
					''
				);
			}
		}
		else
		{
			$this->addBreadcrumb(
				get_the_title(get_option('page_on_front', true)),
				''
			);
		}
	}

	/**
	 * Add a breadcrumb to the breadcrumbs array
	 *
	 * @param  string  $title
	 * @param  string  $url
	 */
	protected function addBreadcrumb($title, $url)
	{
		$this->breadcrumbs[] = ['title' => $title, 'url' => $url];
	}

}

/**
 * Helper function for displaying the breadcrumbs
 */
function the_breadcrumb()
{
	$breadcrumbs = new Breadcrumbs();

	return $breadcrumbs->displayBreadcrumbs();
}