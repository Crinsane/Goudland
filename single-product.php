<?php get_header();?>

<?php get_template_part('page-template', 'header');?>

    <div class="site-page shop-page">
    	<div class="container">
    		<div class="row">
    			<div class="col-sm-3">
				    <?php get_sidebar('shop');?>
    			</div>
    			<div class="product-details col-sm-9">
    				<?php get_template_part('product-single');?>
    			</div>
			</div>
		</div>
	</div>

<?php get_footer();?>