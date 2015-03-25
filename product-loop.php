<?php

$productsLoop = new \Gloudemans\Products\ProductsLoop();
$products = $productsLoop->getQuery();

if($products->have_posts()) : while($products->have_posts()) : $products->the_post();?>

	<?php if(\Gloudemans\Products\ProductListing::getProductListingType() == 'grid') :?>
		<?php get_template_part('product', 'loop-grid');?>
	<?php else :?>
		<?php get_template_part('product', 'loop-list');?>
	<?php endif;?>

<?php endwhile; else: ?>

<?php endif; wp_reset_postdata();?>