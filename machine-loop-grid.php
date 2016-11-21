<div class="col-md-4">
	<div class="panel panel-default product grid">
		<a href="<?php the_permalink();?>" class="panel-body">
            <div style="height: 261px; width: 261px; background-color: white;">
				<?php if (has_post_thumbnail()) :?>
					<span style="display: inline-block; height: 100%; vertical-align: middle;"></span><img src="<?php the_post_thumbnail_url();?>" alt="'.get_the_title().'" style="max-width: 261px; max-height: 261px; vertical-align: middle;">
				<?php endif;?>
            </div>
			<h4 class="product-title"><?php the_title();?> <small><?php the_terms(get_the_ID(), 'product-category');?></small></h4>
		</a>
		<a href="<?php the_permalink();?>" class="panel-footer">
			<i class="fa fa-plus-square"></i> Details bekijken
		</a>
	</div>
</div>