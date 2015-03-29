<div class="col-md-12">
	<div class="panel panel-default product list">
		<div class="panel-body">
			<div class="product-list-item">
				<div class="product-list-thumbnail">
					<a href="<?php the_permalink();?>">
						<?php the_post_thumbnail('product-loop', ['alt' => get_the_title()]);?>
					</a>
				</div>

				<div class="product-list-content">
					<div class="product-list-header">
						<h3 class="product-title"><?php the_title();?></h3>
						<?php if(get_post_meta(get_the_ID(), 'product-price', true) !== '') :?>
							<h2 class="product-price">&euro; <?php echo number_format(get_post_meta(get_the_ID(), 'product-price', true), 2, ',', '.');?></h2>
						<?php endif;?>
						<?php if(get_post_meta(get_the_ID(), 'product-sale', true)) :?>
							<div class="product-badge">Sale</div>
						<?php endif;?>
					</div>
					<div class="product-list-excerpt">
						<?php the_excerpt();?>
					</div>
					<div class="panel-footer">
						<div class="product-list-footer row">
							<a href="<?php the_permalink();?>" class="col-md-6">
								<i class="fa fa-plus-square"></i> Details bekijken
							</a>
							<div class="col-md-6 text-right">
								<?php the_terms(get_the_ID(), 'product-category');?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>