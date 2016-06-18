<?php get_header();?>

<?php get_template_part('page-template', 'header');?>

    <div class="site-page">
    	<div class="container">
    		<div class="row">
    			<div class="col-sm-3">
					<div class="panel panel-default">
						<div>
				    		<?php get_sidebar('brand');?>
						</div>
					</div>
    			</div>
    			<div class="col-sm-9">
    				<div class="row">
						<?php
							$brands = new WP_Query([
								'post_type' => ['brand'],
								'posts_per_page' => -1,
								'orderby' => 'title',
								'order' => 'ASC',
							]);

							if($brands->have_posts()) : while($brands->have_posts()) : $brands->the_post();
						?>
								<div class="col-md-3">
									<div class="panel panel-default product grid">
										<a href="<?php echo get_post_meta(get_the_ID(), 'website', true);?>" class="panel-body">
											<div style="height: 187px; width: 100%; background: white url('<?php the_post_thumbnail_url('full');?>') no-repeat center center; background-size: contain;"></div>
											<h4 class="product-title" style="padding-left: 15px;"><?php the_title();?> <small><?php the_terms(get_the_ID(), 'product-group');?></small></h4>
<!--											<div style="color: #2f383d !important; padding-left: 15px; background: white; height: ">-->
<!--												--><?php
//													$terms = get_the_terms(get_the_ID(), 'group');
//													$tags = array_map(function ($term) {
//														return $term->name;
//													}, $terms);
//													echo implode(', ', $tags);
//												?>
<!--											</div>-->
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