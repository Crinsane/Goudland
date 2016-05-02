<?php get_header();?>

<?php get_template_part('page-template', 'header');?>

    <div class="site-page">
    	<div class="container">
    		<div class="row">
    			<div class="col-sm-3">
				    <?php get_sidebar('brand');?>
    			</div>
    			<div class="col-sm-9">
    				<div class="row">
						<?php
							$brands = new WP_Query([
								'post_type' => ['brand'],
								'posts_per_page' => -1,
							]);

							if($brands->have_posts()) : while($brands->have_posts()) : $brands->the_post();
						?>
								<div class="col-md-4">
									<div class="panel panel-default product grid">
										<a href="<?php the_permalink();?>" class="panel-body">
											<div style="height: 268px; width: 100%; background: white url('<?php the_post_thumbnail_url('full');?>') no-repeat center center; background-size: contain;"></div>
											<h4 class="product-title"><?php the_title();?> <small><?php the_terms(get_the_ID(), 'product-group');?></small></h4>
										</a>
										<a href="<?php the_permalink();?>" class="panel-footer">
											<i class="fa fa-plus-square"></i> Details bekijken
										</a>
									</div>
								</div>
						<?php endwhile; endif; wp_reset_postdata();?>
    				</div>
    			</div>
			</div>
		</div>
	</div>

<?php get_footer();?>