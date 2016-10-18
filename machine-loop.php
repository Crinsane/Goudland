<?php

$productsLoop = new \Gloudemans\Products\ProductsLoop();
$products = $productsLoop->getQuery();

$machineLoop = new \Gloudemans\Machines\MachinesLoop();
$machines = $machineLoop->getQuery();

if($machines->have_posts()) : while($machines->have_posts()) : $machines->the_post();?>

	<?php get_template_part('machine', 'loop-grid');?>

<?php endwhile; else: ?>

<?php endif; wp_reset_postdata();?>