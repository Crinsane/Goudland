<div class="col-md-4">
	<div class="panel panel-default product grid">
		<a href="<?php the_permalink();?>" class="panel-body">
			<?php the_post_thumbnail('product-loop', ['alt' => get_the_title()]);?>
			<h4 class="product-title"><?php the_title();?> <small><?php the_terms(get_the_ID(), 'product-category');?></small></h4>
			<?php if(get_post_meta(get_the_ID(), 'product-price', true) !== '') :?>
				<h3 class="product-price">&euro; <?php echo number_format(get_post_meta(get_the_ID(), 'product-price', true), 2, ',', '.');?></h3>
			<?php endif;?>
		</a>
		<a href="<?php the_permalink();?>" class="panel-footer">
			<i class="fa fa-plus-square"></i> Details bekijken
		</a>
	</div>
</div>